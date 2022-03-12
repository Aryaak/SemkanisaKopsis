import React, { useEffect, useState } from 'react'
import { View, ScrollView, Image } from 'react-native'
import { Colors } from '../../utils'
import { InterFont, ButtonPrimary } from '../../components'
import { EstimateIcon, Plus2Icon, MinIcon } from '../../assets'
import { Storage } from '../../utils'
import { useIsFocused } from "@react-navigation/native";
import { BASE_API_URL } from '../../config'
import axios from 'axios'

const Pay = () => {

    const [orders, setOrders] = useState([])
    const [user, setUser] = useState({ balance: 0 })
    const [token, setToken] = useState()
    const isFocused = useIsFocused();

    useEffect(() => {
        Storage.get('orders')
            .then(res => {
                if (res) setOrders(res)
            })
        Storage.get('user')
            .then(res => {
                setUser(res)
            })
        Storage.get('token')
            .then(res => {
                setToken(res)
            })
    }, [isFocused])

    const getTotal = () => {
        let total = 0
        orders.forEach(item => total += item.price)
        return total
    }

    const submitCheckout = async () => {
        const data = {
            user_id: user.id,
            payment_id: 1,
            total: getTotal(),
            products: []
        }

        orders.forEach(item => {
            data.products.unshift({
                product_id: item.id,
                qty: item.qty
            })
        })

        await axios.post(BASE_API_URL + 'order/store', data, {
            headers: {
                Authorization: token
            },
        })
            .then(res => {
                const meta = res.data.meta
                if (meta.code == 200) {
                    alert('Checkout berhasil, tunggu verifikasi')
                    Storage.remove('orders')
                }
            })
            .catch(err => console.log('ORDER STORE', err))
    }

    return (
        <ScrollView style={{ backgroundColor: 'white' }}>
            <View style={{ flexDirection: 'row', justifyContent: 'space-between', alignItems: 'center', height: 100, backgroundColor: Colors.primary, paddingHorizontal: 25, }}>
                <InterFont text="Pesanan" style={{ color: 'white', fontSize: 16 }} />
                <EstimateIcon />
            </View>

            <View style={{ marginTop: 46, paddingHorizontal: 25 }}>
                {orders.length > 0 && orders.map(item => {
                    return <View style={{ flexDirection: 'row', alignItems: 'center', justifyContent: 'space-between', marginBottom: 16 }} >
                        <View style={{ flexDirection: 'row', alignItems: 'center' }}>
                            <View style={{ width: 64, height: 64, backgroundColor: Colors.grey, borderRadius: 8, marginRight: 16 }}>
                                <Image style={{ width: 64, height: 64, backgroundColor: Colors.grey, borderRadius: 8, marginRight: 16 }} source={{ uri: item.photo }} />
                            </View>
                            <View>
                                <InterFont text={item.name} style={{ color: 'black', fontSize: 16 }} />
                                <View style={{ flexDirection: 'row', marginTop: 16 }}>
                                    <MinIcon />
                                    <InterFont text={item.qty} style={{ color: 'black', fontSize: 16, marginHorizontal: 13 }} />
                                    <Plus2Icon />
                                </View>
                            </View>
                        </View>
                        <InterFont text={'Rp ' + item.price} type="Bold" style={{ fontSize: 18, marginTop: 5, color: Colors.primary }} />
                    </View>
                })}


            </View>

            <View style={{ paddingHorizontal: 25, marginTop: 100, paddingBottom: 200 }}>
                <InterFont text='Metode Pembayaran' type="SemiBold" style={{ fontSize: 20, color: 'black' }} />
                <View style={{
                    flexDirection: 'row',
                    height: 45,
                    backgroundColor: Colors.primary,
                    marginTop: 17,
                    borderRadius: 8,
                    paddingHorizontal: 15,
                    alignItems: 'center',
                    justifyContent: 'space-between'
                }}>
                    <InterFont text='Saldo Kopsis' type="Bold" style={{ fontSize: 18, color: "white" }} />
                    <InterFont text={'Rp ' + user.balance} type="Bold" style={{ fontSize: 18, color: "white" }} />
                </View>
                <View style={{
                    height: 45,
                    borderWidth: 1,
                    borderColor: Colors.primary,
                    marginTop: 17,
                    borderRadius: 8,
                    paddingHorizontal: 15,
                    justifyContent: 'center'
                }}>
                    <InterFont text='Bayar Ditempat' type="Bold" style={{ fontSize: 18, color: Colors.primary }} />
                </View>

                <View style={{ marginTop: 47, flexDirection: 'row', justifyContent: 'space-between', alignItems: 'center' }}>
                    <View>
                        <InterFont text='Total Pembayaran' type="Bold" style={{ fontSize: 16, color: 'black' }} />
                        <InterFont text={'Rp ' + getTotal()} type="Bold" style={{ fontSize: 16, marginTop: 10, color: Colors.primary }} />
                    </View>
                    <ButtonPrimary style={{ width: 154 }} text='Checkout' onPress={() => submitCheckout()} />
                </View>
            </View>
        </ScrollView >
    )
}

export default Pay
