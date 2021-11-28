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

const Login = () => {

    const [form, setForm] = useState({ email: '', password: '' })

    const onValueChange = (type, value) => {
        setForm({ ...form, [type]: value })
    }

    const submitLogin = async () => {
        for (let item in form) {
            if (!form[item]) {
                alert('required')
            }
        }
        await axios.post(BASE_API_URL + 'login', form)
            .then(res => {
                if (res.meta.code == 200) {

                }
            })
            .catch(err => console.log('ERROR LOGIN ', err))
    }

    return (
        <ScrollView style={styles.container} >
            <View style={styles.wrapper}>
                <AppProfileHeader style={{ height: '40%' }} />
                <View style={styles.contentWrapper}>
                    <InterFont text='Masuk' style={{ fontSize: 24, marginTop: 20, fontWeight: 'bold', color: 'black' }} />

                    <Input value={form.email} onChangeText={value => onValueChange('email', value)} style={{ marginTop: 24 }} label='Email' placeholder='Masukan email' />
                    <Input value={form.password} onChangeText={value => onValueChange('password', value)} style={{ marginTop: 20 }} label='Kata sandi' placeholder='Masukan kata sandi' secureTextEntry />


                    <ButtonPrimary style={{ marginTop: 20 }} text='Masuk' onPress={() => submitLogin()} />

                    <Anchor style={[styles.anchor, { marginTop: 24 }]} text="Lupa Password?" />

                    <View style={styles.link}>
                        <InterFont text='Belum punya akun?' style={{
                            fontSize: 16,
                            fontWeight: '500',
                            color: Colors.grey,
                            textAlign: 'center'
                        }} />
                        <Anchor href='Register' style={[styles.anchor, { marginLeft: 5 }]} text="Daftar" />
                    </View>

                </View>
            </View>
        </ScrollView>
    )
}

export default Login

const styles = StyleSheet.create({
    container: {
        backgroundColor: Colors.primary,
        flex: 1
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
        paddingBottom: '50%'
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
        marginTop: 24
    }
})
