import React from 'react'
import { StyleSheet, Text, View } from 'react-native'
import { AppIcon } from '../../../assets'

const AppLogo = ({ style }) => {
    return (
        <View style={[styles.wrapper, style]}>
            <AppIcon />
        </View>
    )
}

export default AppLogo

const styles = StyleSheet.create({
    wrapper: {
        alignItems: 'center',
        justifyContent: 'center',
        resizeMode: 'cover',
        backgroundColor: 'white',
        width: 99,
        height: 99,
        borderRadius: 99 / 2
    }
})
