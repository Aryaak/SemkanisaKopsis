import React from 'react'
import { Text } from 'react-native'

const InterFont = ({ text = '', type = 'Regular', style }) => {
    return (
        <Text style={[{ fontFamily: 'Inter-' + type }, style]}>{text}</Text>
    )
}

export default InterFont
