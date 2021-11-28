import React from 'react'
import { StyleSheet, TouchableOpacity, View } from 'react-native'
import { InterFont } from '../../../components'
import { Colors } from '../../../utils'

const ProductCardHome = ({ onPress }) => {
    return (
        <TouchableOpacity onPress={onPress}>
            <View style={styles.card}>
            </View>

            <InterFont text='Pensil 2B' type="SemiBold" style={styles.name} />
            <InterFont text='Rp. 3.500' type="Bold" style={styles.price} />
        </TouchableOpacity>
    )
}

export default ProductCardHome

const styles = StyleSheet.create({
    card: {
        width: 200,
        height: 130,
        backgroundColor: Colors.grey,
        borderRadius: 8,
        marginRight: 20
    },
    name: {
        fontSize: 15,
        marginTop: 10,
        color: 'black'
    },
    price: {
        fontSize: 18,
        marginTop: 5,
        color: Colors.primary
    }
})
