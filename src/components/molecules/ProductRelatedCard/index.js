import React from 'react'
import { StyleSheet, View } from 'react-native'
import { Colors } from '../../../utils'
import { InterFont } from '../../../components'

const ProductRelatedCard = () => {
    return (
        <View style={{
            height: 213,
            width: 155,
            backgroundColor: 'white',
            overflow: 'hidden',
            borderTopLeftRadius: 8,
            borderTopRightRadius: 8,
        }}>
            <View style={{ height: 125, backgroundColor: Colors.grey, marginBottom: 20 }}></View>
            <View style={{ paddingHorizontal: 10 }}>
                <InterFont text="TMA-2 HD Wireless" style={{
                    color: 'black',
                    fontSize: 14,
                    marginBottom: 5,
                }} />
                <InterFont text="Rp 3.000" type="Bold" style={{
                    color: Colors.primary,
                    fontSize: 12,
                }} />
            </View>

        </View>
    )
}

export default ProductRelatedCard

const styles = StyleSheet.create({})
