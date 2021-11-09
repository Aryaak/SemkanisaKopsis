import React from 'react'
import {
    StyleSheet,
    Text, View
} from 'react-native'
import { AppIcon, WaveIllustration } from '../../assets'
import { Colors } from '../../utils'

const SplashScreen = ({ navigation }) => {

    setTimeout(() => {
        navigation.navigate('Home');
    },
        3000)

    return (
        <View style={styles.wrapper}>
            <AppIcon />
            <WaveIllustration style={styles.wave} />
            <Text style={{ fontSize: 32, fontWeight: 'bold', color: 'white', marginTop: -20 }} >SemkanisaKopsis</Text>
        </View>
    )
}

export default SplashScreen

const styles = StyleSheet.create({
    wrapper: {
        flex: 1,
        position: 'relative',
        backgroundColor: Colors.primary,
        alignItems: 'center',
        justifyContent: 'center'
    },
    wave: {
        position: 'absolute',
        bottom: 0
    }
})
