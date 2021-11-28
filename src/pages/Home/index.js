import React from 'react'
import { StyleSheet, View, ScrollView, TouchableOpacity } from 'react-native'
import { Colors } from '../../utils'
import {
    WaveIllustration,
    NotifIcon,
    PlusIcon,
    UpIcon,
    DownIcon,
    EditIcon,
    WatchIcon,
    ArchiveIcon,
    CoffeeIcon,
    ConflictIcon
} from '../../assets'
import { InterFont, ProductsHome } from '../../components'

const Home = () => {
    return (
        <ScrollView style={{ backgroundColor: 'white' }} >
            <View style={styles.headerWrapper}>
                <View style={{ flexDirection: 'row', alignItems: 'center', justifyContent: 'space-between' }}>
                    <View>
                        <InterFont text='Saldo Kopsis' type="SemiBold" style={{ fontSize: 16, color: 'white' }} />
                        <InterFont text='Rp 500.000' type="Bold" style={{ fontSize: 24, color: 'white', marginTop: 5 }} /></View>
                    <NotifIcon />
                </View>
                <WaveIllustration style={{ position: 'absolute', bottom: -150, right: 0 }} />
            </View>

            <View style={{
                height: 100,
                width: '100%',
                paddingHorizontal: 25,
                alignSelf: 'center',
            }}>
                <View style={{
                    flexDirection: 'row',
                    justifyContent: 'space-between',
                    alignItems: 'center',
                    paddingHorizontal: 25,
                    position: 'relative',
                    elevation: 1,
                    top: -50,
                    backgroundColor: 'white',
                    height: '100%',
                    borderRadius: 8
                }}>
                    <View style={{
                        alignItems: 'center'
                    }}>
                        <View style={{
                            width: 40,
                            height: 40,
                            backgroundColor: Colors.primary,
                            borderRadius: 8,
                            alignItems: 'center',
                            justifyContent: 'center'
                        }}><PlusIcon /></View>
                        <InterFont text='Deposit' type="Bold" style={{ fontSize: 14, color: 'black', marginTop: 5 }} />
                    </View>
                    <View style={{
                        alignItems: 'center'
                    }}>
                        <View style={{
                            width: 40,
                            height: 40,
                            backgroundColor: Colors.purple,
                            borderRadius: 8,
                            alignItems: 'center',
                            justifyContent: 'center'
                        }}><UpIcon /></View>
                        <InterFont text='Kirim' type="Bold" style={{ fontSize: 14, color: 'black', marginTop: 5 }} />
                    </View>
                    <View style={{
                        alignItems: 'center'
                    }}>
                        <View style={{
                            width: 40,
                            height: 40,
                            backgroundColor: Colors.softRed,
                            borderRadius: 8,
                            alignItems: 'center',
                            justifyContent: 'center'
                        }}><DownIcon /></View>
                        <InterFont text='Minta' type="Bold" style={{ fontSize: 14, color: 'black', marginTop: 5 }} />
                    </View>
                </View>
            </View>

            <View style={{
                marginTop: -20,
                paddingHorizontal: 25,
                flexDirection: 'row',
                justifyContent: 'space-between',
                alignItems: 'center'
            }}>
                <View style={{ elevation: 1, width: 70, height: 70, backgroundColor: 'white', borderRadius: 8, justifyContent: 'center', alignItems: 'center' }}>
                    <EditIcon />
                    <InterFont text='Alat Tulis' type="SemiBold" style={{ fontSize: 14, color: 'black', marginTop: 5 }} />
                </View>
                <View style={{ elevation: 1, width: 70, height: 70, backgroundColor: 'white', borderRadius: 8, justifyContent: 'center', alignItems: 'center' }}>
                    <WatchIcon />
                    <InterFont text='Artibut' type="SemiBold" style={{ fontSize: 14, color: 'black', marginTop: 5 }} />
                </View>
                <View style={{ elevation: 1, width: 70, height: 70, backgroundColor: 'white', borderRadius: 8, justifyContent: 'center', alignItems: 'center' }}>
                    <ArchiveIcon />
                    <InterFont text='Makanan' type="SemiBold" style={{ fontSize: 14, color: 'black', marginTop: 5 }} />
                </View>
                <View style={{ elevation: 1, width: 70, height: 70, backgroundColor: 'white', borderRadius: 8, justifyContent: 'center', alignItems: 'center' }}>
                    <CoffeeIcon />
                    <InterFont text='Minuman' type="SemiBold" style={{ fontSize: 14, color: 'black', marginTop: 5 }} />
                </View>
            </View>

            <View style={{ marginTop: 25 }}>
                <InterFont text='Keunggulan Kami' type="SemiBold" style={{ paddingHorizontal: 25, fontSize: 20, color: 'black' }} />
                <ScrollView horizontal showsHorizontalScrollIndicator={false} style={{ marginTop: 12, paddingLeft: 25, flexDirection: 'row' }}>
                    <View style={{
                        height: 96,
                        width: 280,
                        backgroundColor: Colors.primary,
                        borderRadius: 8,
                        flexDirection: 'row',
                        alignItems: 'center',
                        justifyContent: 'center',
                        paddingHorizontal: 20,
                    }}>
                        <View>
                            <InterFont text='Keunggulan Kami' type="SemiBold" style={{ fontSize: 18, color: 'white' }} />
                            <InterFont text='anda bisa cek produk langsung lewat aplikasi' type="SemiBold" style={{ fontSize: 12, color: 'white' }} />
                        </View>
                        <ConflictIcon style={{ marginLeft: 10 }} />
                    </View>
                    <View style={{
                        height: 96,
                        width: 280,
                        backgroundColor: Colors.primary,
                        borderRadius: 8,
                        flexDirection: 'row',
                        alignItems: 'center',
                        justifyContent: 'center',
                        paddingHorizontal: 20,
                        marginLeft: 20
                    }}>
                        <View>
                            <InterFont text='Keunggulan Kami' type="SemiBold" style={{ fontSize: 18, color: 'white' }} />
                            <InterFont text='anda bisa cek produk langsung lewat aplikasi' type="SemiBold" style={{ fontSize: 12, color: 'white' }} />
                        </View>
                        <ConflictIcon style={{ marginLeft: 10 }} />
                    </View>
                    <View style={{
                        height: 96,
                        width: 280,
                        backgroundColor: Colors.primary,
                        borderRadius: 8,
                        flexDirection: 'row',
                        alignItems: 'center',
                        justifyContent: 'center',
                        paddingHorizontal: 20,
                        marginLeft: 20,
                    }}>
                        <View>
                            <InterFont text='Keunggulan Kami' type="SemiBold" style={{ fontSize: 18, color: 'white' }} />
                            <InterFont text='anda bisa cek produk langsung lewat aplikasi' type="SemiBold" style={{ fontSize: 12, color: 'white' }} />
                        </View>
                        <ConflictIcon style={{ marginLeft: 10 }} />
                    </View>
                </ScrollView>
            </View>

            <View style={{ marginTop: 25, marginBottom: 100 }}>
                <View style={{ flexDirection: 'row', paddingHorizontal: 25, justifyContent: 'space-between', alignItems: 'center' }}>
                    <InterFont text='Produk Kami' type="SemiBold" style={{ fontSize: 20, color: 'black' }} />
                    <InterFont text='Lihat Semua' style={{ fontSize: 15, color: Colors.primary }} />
                </View>

                <ProductsHome />
            </View>
        </ScrollView >
    )
}

export default Home

const styles = StyleSheet.create({
    headerWrapper: {
        position: 'relative',
        height: 187,
        backgroundColor: Colors.primary,
        padding: 25
    }
})
