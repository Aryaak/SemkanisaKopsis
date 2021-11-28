import React from 'react'
import { StyleSheet, View } from 'react-native'
import { WaveIllustration } from '../../../assets'
import { AppProfile } from '../../../components'
import { Colors } from '../../../utils'

const AppProfileHeader = ({ style }) => {
    return (
        <View style={[styles.wrapper, style]}>
            <AppProfile />
            <WaveIllustration style={styles.wave} />
        </View>
    )
}

export default AppProfileHeader

const styles = StyleSheet.create({
    wrapper: {
        backgroundColor: Colors.primary,
        justifyContent: 'center',
    },
    wave: {
        position: 'absolute',
        bottom: -110,
        right: 0
    }
})
