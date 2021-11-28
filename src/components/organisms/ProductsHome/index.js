import { useNavigation } from '@react-navigation/native'
import React from 'react'
import { StyleSheet, ScrollView } from 'react-native'
import { ProductCardHome } from '../..'

const ProductsHome = () => {

    const navigation = useNavigation()

    return (
        <ScrollView horizontal showsHorizontalScrollIndicator={false} style={styles.wrapper}>
            <ProductCardHome onPress={() => navigation.navigate('ProductDetail')} />
            <ProductCardHome />
            <ProductCardHome />
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
