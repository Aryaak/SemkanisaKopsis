import { useNavigation } from '@react-navigation/native'
import React, { useState, useEffect } from 'react'
import { StyleSheet, ScrollView } from 'react-native'
import { ProductCardHome } from '../..'
import { Storage } from '../../../utils'
import axios from 'axios'
import { BASE_API_URL } from '../../../config'

const ProductsHome = () => {

    const navigation = useNavigation()
    const [products, setProducts] = useState({})

    useEffect(() => {
        Storage.get('token')
            .then(res => {
                getProducts(res)
            })

    }, [])

    const getProducts = async (token) => {
        await axios.get(BASE_API_URL + 'product/get-for-home', {
            headers: {
                Authorization: token
            },
        })
            .then(res => {
                const meta = res.data.meta
                if (meta.code == 200) {
                    setProducts(res.data.data)
                    console.log("PRODUCTS", products)
                }
            })
            .catch(err => console.log('GET PRODUCT FOR HOME', err))
    }

    return (
        <ScrollView horizontal showsHorizontalScrollIndicator={false} style={styles.wrapper}>
            {products.length > 0 && products.map(item => <ProductCardHome name={item.name} price={item.price} photo={item.photo} onPress={() => navigation.navigate('ProductDetail', { id: item.id })} />)}
        </ScrollView>
    )
}

export default ProductsHome

const styles = StyleSheet.create({
    wrapper: {
        marginTop: 12,
        paddingHorizontal: 25,
        marginBottom: 50,
        flexDirection: 'row'
    }
})
