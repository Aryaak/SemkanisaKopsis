import React from 'react'
import { StyleSheet, Text, TouchableOpacity } from 'react-native'
import { Colors } from '../../../utils'
import { InterFont } from '../../../components'

const ButtonPrimary = ({ style, text, onPress }) => {
    return (
        <TouchableOpacity style={[styles.wrapper, style]} onPress={onPress}>
            <InterFont text={text} style={styles.text} />
        </TouchableOpacity>
    )
}

export default ButtonPrimary

const styles = StyleSheet.create({
    wrapper: {
        backgroundColor: Colors.primary,
        height: 56,
        justifyContent: 'center',
        alignItems: 'center',
        borderRadius: 8
    },
    text: {
        fontSize: 16,
        fontWeight: 'bold',
        color: 'white'
    }
})
