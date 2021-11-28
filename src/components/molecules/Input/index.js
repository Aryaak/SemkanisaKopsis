import React from 'react'
import { StyleSheet, View, TextInput } from 'react-native'
import { Colors } from '../../../utils'
import { InterFont } from '../../../components'

const Input = ({ style, label, placeholder, secureTextEntry, onChangeText, value }) => {
    return (
        <View style={[styles.wrapper, style]}>
            <InterFont text={label} style={styles.text} />
            <TextInput value={value} placeholder={placeholder} secureTextEntry={secureTextEntry} onChangeText={onChangeText} />
        </View>
    )
}

export default Input

const styles = StyleSheet.create({
    wrapper: {
        paddingHorizontal: 12,
        paddingVertical: 8,
        borderColor: Colors.grey,
        borderRadius: 8,
        height: 70,
        borderWidth: 1
    },
    text: {
        fontSize: 12,
        color: Colors.grey
    }
})
