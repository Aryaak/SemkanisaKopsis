import React, { useState } from 'react'
import {
    StyleSheet,
    View,
    ScrollView
} from 'react-native'
import { Colors } from '../../utils'
import {
    AppProfileHeader,
    Input,
    ButtonPrimary,
    Anchor,
    InterFont
} from '../../components'

import { BASE_API_URL } from '../../config'

import axios from 'axios'

const Register = () => {

    const [form, setForm] = useState({
        name: '',
        email: '',
        phone: '',
        password: '',
        password_c: ''
    })

    const onValueChange = (type, value) => {
        setForm({ ...form, [type]: value })
    }

    const submitLogin = async () => {

        for (let item in form) {
            if (!form[item]) {
                alert('required')
            }
        }

        await axios.post(BASE_API_URL + 'register', form)
            .then(res => {
                if (res.meta.code == 200) {

                }
            })
            .catch(err => console.log('ERROR LOGIN ', err))
    }
    return (
        <ScrollView style={styles.container}  >
            <View style={styles.wrapper}>
                <AppProfileHeader style={{ height: '30%' }} />
                <View style={styles.contentWrapper}>
                    <InterFont text='Daftar' style={{ fontSize: 24, marginTop: 20, fontWeight: 'bold', color: 'black' }} />

                    <Input value={form.name} onChangeText={value => onValueChange('name', value)} style={{ marginTop: 24 }} label='Nama' placeholder='Masukan nama' />
                    <Input value={form.email} onChangeText={value => onValueChange('email', value)} style={{ marginTop: 20 }} label='Email' placeholder='Masukan email' />
                    <Input value={form.phone} onChangeText={value => onValueChange('phone', value)} style={{ marginTop: 20 }} label='Nomor hp' placeholder='Masukan Nomor hp' />
                    <Input value={form.password} onChangeText={value => onValueChange('password', value)} style={{ marginTop: 20 }} label='Kata sandi' placeholder='Masukan kata sandi' secureTextEntry />
                    <Input value={form.password_c} onChangeText={value => onValueChange('password_c', value)} style={{ marginTop: 20 }} label='Konfrimasi kata sandi' placeholder='Masukan konfrimasi kata sandi' secureTextEntry />

                    <ButtonPrimary onPress={() => submitLogin()} style={{ marginTop: 20 }} text='Daftar' />

                    <View style={styles.link}>
                        <InterFont text='Sudah punya akun?' style={{
                            fontSize: 16,
                            fontWeight: '500',
                            color: Colors.grey,
                            textAlign: 'center'
                        }} />
                        <Anchor href='Login' style={[styles.anchor, { marginLeft: 5 }]} text="Masuk" />
                    </View>

                </View>
            </View>
        </ScrollView>
    )
}

export default Register

const styles = StyleSheet.create({
    container: {
        backgroundColor: Colors.primary,
        flex: 1,
    },
    wrapper: {
        backgroundColor: Colors.primary,
        flex: 1
    },
    contentWrapper: {
        backgroundColor: 'white',
        borderTopLeftRadius: 16,
        borderTopRightRadius: 16,
        paddingHorizontal: 24,
        paddingTop: 24,
        paddingBottom: '40%'

    },
    anchor: {
        fontSize: 16,
        fontWeight: 'bold',
        color: Colors.primary,
        textAlign: 'center'
    },
    link: {
        flexDirection: 'row',
        alignItems: 'center',
        alignSelf: 'center',
        marginTop: 24,
        marginBottom: 45
    }
})
