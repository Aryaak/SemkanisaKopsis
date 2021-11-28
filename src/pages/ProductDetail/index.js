import React from 'react'
import {
    ScrollView,
    StyleSheet,
    View
} from 'react-native'
import { Colors } from '../../utils'
import { InterFont, RelatedProducts, ButtonPrimary } from '../../components'
import { LeftIcon, StarIcon } from '../../assets'

const ProductDetail = () => {
    return (
        <View>
            <ScrollView style={{ backgroundColor: 'white', }}>
                <View style={{
                    height: 100,
                    flexDirection: 'row',
                    alignItems: 'center',
                    backgroundColor: Colors.primary,
                    paddingHorizontal: 25,
                    paddingTop: 40
                }}>
                    <LeftIcon />
                    <InterFont text="Detail" style={{ flex: 1, color: 'white', fontSize: 16, textAlign: 'center' }} />
                </View>

                <View style={{ marginTop: 17, paddingHorizontal: 25 }}>
                    <InterFont text="Rp 3.500" type="SemiBold" style={{
                        color: Colors.primary,
                        fontSize: 16,
                    }} />
                    <InterFont text="Pensil 2B" type="Bold" style={{
                        marginTop: 5,
                        color: "black",
                        fontSize: 28,
                        marginBottom: 17
                    }} />
                    <View style={{
                        height: 391,
                        backgroundColor: Colors.grey,
                        borderRadius: 8,
                        marginBottom: 50
                    }}></View>

                    <InterFont text="Deskirpsi" type="SemiBold" style={{
                        color: 'black',
                        fontSize: 16,
                    }} />
                    <InterFont text="The speaker unit contains a diaphragm that is precision-grown from NAC Audio bio-cellulose, making it stiffer, lighter and stronger than regular PET speaker units, and allowing the sound-producing diaphragm to vibrate without the levels of distortion found in other speakers. " style={{
                        color: 'black',
                        fontSize: 14,
                        marginTop: 13,
                        marginBottom: 50
                    }} />

                    <View style={{ flexDirection: 'row', marginBottom: 30 }}>
                        <InterFont text="Ulasan" style={{
                            color: 'black',
                            fontSize: 16,
                        }} />
                        <InterFont text="(2)" style={{
                            color: 'black',
                            fontSize: 16,
                            marginLeft: 5
                        }} />
                    </View>

                    <View>
                        <View style={{ flexDirection: 'row', justifyContent: 'space-between', alignItems: 'flex-start', marginBottom: 15 }}>
                            <View style={{ flexDirection: 'row' }}>
                                <View style={{ marginRight: 13, width: 40, height: 40, backgroundColor: Colors.grey, borderRadius: 40 / 2 }}>
                                </View>
                                <View>
                                    <InterFont text="Madelina" style={{
                                        color: 'black',
                                        fontSize: 16,
                                        marginBottom: 4
                                    }} />
                                    <View style={{ width: '50%', flexDirection: 'row', justifyContent: 'space-between' }}>
                                        <StarIcon />
                                        <StarIcon />
                                        <StarIcon />
                                        <StarIcon />
                                        <StarIcon />
                                    </View>
                                </View>
                            </View>
                            <InterFont text="1 Hari lalu" style={{
                                color: Colors.grey,
                                fontSize: 12,
                                marginLeft: 5
                            }} />
                        </View>

                        <InterFont text="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua." style={{
                            color: 'black',
                            fontSize: 14,
                            marginLeft: 5
                        }} />
                    </View>
                </View>

                <View style={{ paddingVertical: 28, marginTop: 50, marginBottom: 100, height: 320, backgroundColor: Colors.overlay }}>
                    <InterFont text="Produk Terkait" style={{
                        color: 'black',
                        fontSize: 16,
                        marginLeft: 5,
                        paddingHorizontal: 25,
                        marginBottom: 16
                    }} />

                    <RelatedProducts />
                </View>
            </ScrollView>

            <View style={{
                paddingHorizontal: 25,
                borderTopLeftRadius: 8,
                borderTopRightRadius: 8,
                elevation: 1,
                height: 100,
                justifyContent: 'center',
                backgroundColor: 'white',
                position: 'absolute', bottom: 0, width: '100%'
            }}>
                <ButtonPrimary text="Pesan" />
            </View>
        </View>

    )
}

export default ProductDetail

const styles = StyleSheet.create({})
