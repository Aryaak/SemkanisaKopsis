import React from 'react'
import { View, ScrollView } from 'react-native'
import { Colors } from '../../utils'
import { InterFont, ButtonPrimary } from '../../components'
import { EstimateIcon, Plus2Icon, MinIcon } from '../../assets'

const Pay = () => {
    return (
        <ScrollView style={{ backgroundColor: 'white' }}>
            <View style={{ flexDirection: 'row', justifyContent: 'space-between', alignItems: 'center', height: 100, backgroundColor: Colors.primary, paddingHorizontal: 25, }}>
                <InterFont text="Pesanan" style={{ color: 'white', fontSize: 16 }} />
                <EstimateIcon />
            </View>

            <View style={{ marginTop: 46, paddingHorizontal: 25 }}>
                <View style={{ flexDirection: 'row', alignItems: 'center', justifyContent: 'space-between', marginBottom: 16 }} >
                    <View style={{ flexDirection: 'row', alignItems: 'center' }}>
                        <View style={{ width: 64, height: 64, backgroundColor: Colors.grey, borderRadius: 8, marginRight: 16 }}></View>
                        <View>
                            <InterFont text="Pensil 2B" style={{ color: 'black', fontSize: 16 }} />
                            <View style={{ flexDirection: 'row', marginTop: 16 }}>
                                <MinIcon />
                                <InterFont text="1" style={{ color: 'black', fontSize: 16, marginHorizontal: 13 }} />
                                <Plus2Icon />
                            </View>
                        </View>
                    </View>
                    <InterFont text='Rp. 3.500' type="Bold" style={{ fontSize: 18, marginTop: 5, color: Colors.primary }} />
                </View>
                <View style={{ flexDirection: 'row', alignItems: 'center', justifyContent: 'space-between', marginBottom: 16 }} >
                    <View style={{ flexDirection: 'row', alignItems: 'center' }}>
                        <View style={{ width: 64, height: 64, backgroundColor: Colors.grey, borderRadius: 8, marginRight: 16 }}></View>
                        <View>
                            <InterFont text="Pensil 2B" style={{ color: 'black', fontSize: 16 }} />
                            <View style={{ flexDirection: 'row', marginTop: 16 }}>
                                <MinIcon />
                                <InterFont text="1" style={{ color: 'black', fontSize: 16, marginHorizontal: 13 }} />
                                <Plus2Icon />
                            </View>
                        </View>
                    </View>
                    <InterFont text='Rp. 3.500' type="Bold" style={{ fontSize: 18, marginTop: 5, color: Colors.primary }} />
                </View>
                <View style={{ flexDirection: 'row', alignItems: 'center', justifyContent: 'space-between', marginBottom: 16 }} >
                    <View style={{ flexDirection: 'row', alignItems: 'center' }}>
                        <View style={{ width: 64, height: 64, backgroundColor: Colors.grey, borderRadius: 8, marginRight: 16 }}></View>
                        <View>
                            <InterFont text="Pensil 2B" style={{ color: 'black', fontSize: 16 }} />
                            <View style={{ flexDirection: 'row', marginTop: 16 }}>
                                <MinIcon />
                                <InterFont text="1" style={{ color: 'black', fontSize: 16, marginHorizontal: 13 }} />
                                <Plus2Icon />
                            </View>
                        </View>
                    </View>
                    <InterFont text='Rp. 3.500' type="Bold" style={{ fontSize: 18, marginTop: 5, color: Colors.primary }} />
                </View>
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
                    <InterFont text='Rp 3.500' type="Bold" style={{ fontSize: 18, color: "white" }} />
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
                        <InterFont text='Saldo Kopsis' type="Bold" style={{ fontSize: 16, color: 'black' }} />
                        <InterFont text='Rp 10.000' type="Bold" style={{ fontSize: 16, marginTop: 10, color: Colors.primary }} />
                    </View>
                    <ButtonPrimary style={{ width: 154 }} text='Checkout' />
                </View>
            </View>
        </ScrollView >
    )
}

export default Pay
