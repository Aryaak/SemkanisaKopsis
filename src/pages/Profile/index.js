import React from 'react'
import { View, ScrollView, TouchableOpacity } from 'react-native'
import { Colors } from '../../utils'
import { InterFont } from '../../components'
import {
    WaveIllustration,
    ImportantIcon,
    CardIcon,
    DoorIcon,
    RightIcon
} from '../../assets'
import { useNavigation } from '@react-navigation/native'
const Profile = () => {

    const navigation = useNavigation()

    const submitLogout = () => {
        navigation.navigate('Login')
    }

    return (
        <ScrollView style={{ backgroundColor: 'white', overflow: 'hidden' }}>
            <View style={{ position: 'relative', height: 167, backgroundColor: Colors.primary, paddingHorizontal: 25, }}>
                <InterFont text="Profile" style={{ color: 'white', fontSize: 16, marginTop: 47 }} />
                <WaveIllustration style={{ position: 'absolute', bottom: -150, right: 0 }} />
            </View>

            <View style={{
                paddingHorizontal: 25,
                alignSelf: 'center',
                top: -50,
                height: 116,
                width: '100%',
            }} >

                <View style={{
                    height: '100%',
                    backgroundColor: 'white',
                    elevation: 1,
                    borderRadius: 8,
                    flexDirection: 'row',
                    alignItems: 'center',
                    paddingHorizontal: 16
                }}>
                    <View style={{ width: 60, height: 60, backgroundColor: Colors.grey, borderRadius: 60 / 2 }}></View>

                    <View style={{ marginLeft: 16 }}>
                        <InterFont text="Samantha Zalora" type="Bold" style={{ color: 'black', fontSize: 18, marginBottom: 10 }} />
                        <InterFont text="Ubah profile" style={{ color: Colors.grey, fontSize: 14, }} />
                    </View>
                </View>
            </View>

            <View style={{ paddingHorizontal: 25 }}>
                <View style={{
                    flexDirection: 'row',
                    paddingHorizontal: 16,
                    alignItems: 'center',
                    justifyContent: 'space-between',
                    height: 56,
                    backgroundColor: 'white',
                    borderWidth: 1,
                    borderColor: 'rgba(242,242,242, 0.8)', borderRadius: 8
                }}>
                    <View style={{ flexDirection: 'row', alignItems: 'center' }}>
                        <ImportantIcon />
                        <InterFont text="Verifikasi" style={{ color: 'black', fontSize: 16, marginLeft: 12 }} />
                    </View>

                    <View style={{ flexDirection: 'row', alignItems: 'center' }}>
                        <InterFont text="Kartu Pelajar" style={{ color: Colors.primary, fontSize: 16, marginRight: 12 }} />
                        <RightIcon />
                    </View>
                </View>

                <View style={{
                    marginTop: 16,
                    flexDirection: 'row',
                    paddingHorizontal: 16,
                    alignItems: 'center',
                    justifyContent: 'space-between',
                    height: 56,
                    backgroundColor: 'white',
                    borderWidth: 1,
                    borderColor: 'rgba(242,242,242, 0.8)', borderRadius: 8
                }}>
                    <View style={{ flexDirection: 'row', alignItems: 'center' }}>
                        <CardIcon />
                        <InterFont text="Simpanan" style={{ color: 'black', fontSize: 16, marginLeft: 12 }} />
                    </View>

                    <View style={{ flexDirection: 'row', alignItems: 'center' }}>
                        <InterFont text="Rp 90.000" style={{ color: Colors.primary, fontSize: 16, marginRight: 12 }} />
                        <RightIcon />
                    </View>
                </View>

                <TouchableOpacity onPress={() => submitLogout()} style={{
                    height: 56,
                    backgroundColor: Colors.softRed,
                    marginTop: 32,
                    borderRadius: 8,
                    flexDirection: 'row',
                    alignItems: 'center',
                    paddingHorizontal: 16
                }}>
                    <DoorIcon />
                    <InterFont text="Log Out" style={{ color: 'white', fontSize: 16, marginLeft: 16 }} />
                </TouchableOpacity>
            </View>
        </ScrollView>
    )
}

export default Profile
