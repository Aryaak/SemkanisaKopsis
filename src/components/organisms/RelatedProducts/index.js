import React from 'react'
import { StyleSheet, ScrollView } from 'react-native'
import { ProductRelatedCard } from '../../../components'

const RelatedProducts = () => {
    return (
        <ScrollView style={{ paddingLeft: 25 }} horizontal showsHorizontalScrollIndicator={false}>
            <ProductRelatedCard />
        </ScrollView>
    )
}

export default RelatedProducts

const styles = StyleSheet.create({})
