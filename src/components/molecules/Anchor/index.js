import { useNavigation } from '@react-navigation/native'
import React from 'react'
import { TouchableOpacity } from 'react-native'
import { InterFont } from '../../../components'

const Anchor = ({ text, style, href }) => {

    const navigation = useNavigation()

    return (
        <TouchableOpacity onPress={() => navigation.navigate(href)}>
            <InterFont text={text} style={style} />
        </TouchableOpacity>
    )
}

export default Anchor

