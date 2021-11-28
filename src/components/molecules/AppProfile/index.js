import React from 'react'
import { View, StyleSheet } from 'react-native'
import { AppLogo, InterFont } from '../../../components'

const AppProfile = () => {
    return (
        <View>
            <AppLogo style={styles.logo} />
            <InterFont style={styles.text} text='SemkanisaKopsis' />
        </View>
    )
}

export default AppProfile

const styles = StyleSheet.create({
    wrapper: {
        alignSelf: 'center'
    },
    logo: {
        marginBottom: 40,
        alignSelf: 'center'
    },
    text: {
        fontSize: 32,
        fontWeight: 'bold',
        color: 'white',
        marginTop: -20,
        textAlign: 'center'
    }
})
