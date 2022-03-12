import React from 'react'
import { StyleSheet, TouchableOpacity, View, Image } from 'react-native'
import { InterFont } from '../../../components'
import { Colors } from '../../../utils'

const ProductCardHome = ({ onPress, name, price, photo }) => {
    return (
        <TouchableOpacity onPress={onPress}>
            <View style={styles.card}>
                <Image style={styles.card} source={{ uri: photo }} />
            </View>
            <InterFont text={name} type="SemiBold" style={styles.name} />
            <InterFont text={'Rp. ' + price} type="Bold" style={styles.price} />
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
