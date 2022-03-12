import React from 'react'
import {
    StyleSheet,
    View
} from 'react-native'
import { WaveIllustration } from '../../assets'
import { Colors,Storage } from '../../utils'
import { AppProfile } from '../../components'
import { StackActions } from '@react-navigation/native'

const SplashScreen = ({ navigation }) => {

    setTimeout(() => {
        Storage.get('isLogged')
        .then(res=> {
            if(res){
                navigation.dispatch(StackActions.replace('MainPages'));
            } else {
                navigation.dispatch(StackActions.replace('Login'));
            }

        })
    }, 3000)

    return (
        <View style={styles.wrapper}>
            <AppProfile />
            <WaveIllustration style={styles.wave} />
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
        bottom: 0,
        right: 0
    }
})
