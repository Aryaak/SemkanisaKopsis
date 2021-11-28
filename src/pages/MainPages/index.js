import React from 'react'
import { View } from 'react-native'
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs';
import {
    Home,
    Pay, Profile
} from '../../pages'

import {
    HomeIcon,
    PayIcon,
    ProfileIcon,
    HomeActiveIcon,
    PayActiveIcon,
    ProfileActiveIcon
} from '../../assets'
import { InterFont } from '../../components'
import { Colors } from '../../utils';

const Tab = createBottomTabNavigator();

const MainPages = () => {
    return (
        <Tab.Navigator screenOptions={{
            headerShown: false,
            tabBarShowLabel: false,
            tabBarStyle: {
                position: 'absolute',
                backgroundColor: 'white',
                height: 64,
                borderRadius: 64 / 2,
                marginBottom: 30,
                marginHorizontal: 25
            },

        }}  >
            <Tab.Screen options={{
                tabBarIcon: ({ focused }) => {
                    if (focused) {
                        return <View style={{ alignItems: 'center' }}>
                            <HomeActiveIcon style={{ color: Colors.primary }} />
                            <InterFont text='Beranda' type='Bold' style={{ color: Colors.primary }} />
                        </View>
                    } else {
                        return (
                            <View style={{ alignItems: 'center' }}>
                                <HomeIcon />
                                <InterFont text='Beranda' type='Bold' />
                            </View>
                        )
                    }

                }
            }} name="Home" component={Home} />
            <Tab.Screen
                options={{
                    tabBarIcon: ({ focused }) => {
                        if (focused) {
                            return <View style={{
                                width: 72,
                                height: 72,
                                backgroundColor: Colors.primary,
                                borderRadius: 72 / 2,
                                justifyContent: 'center',
                                alignItems: 'center',
                                elevation: 1,
                                marginBottom: 50,
                            }}>
                                <PayActiveIcon />
                                <InterFont text='Bayar' type='Bold' style={{ color: 'white' }} />
                            </View>
                        } else {
                            return (
                                <View style={{
                                    width: 72,
                                    height: 72,
                                    backgroundColor: 'white',
                                    borderRadius: 72 / 2,
                                    justifyContent: 'center',
                                    alignItems: 'center',
                                    elevation: 1,
                                    marginBottom: 50,
                                    borderWidth: 1,
                                    borderColor: Colors.primary
                                }}>
                                    <PayIcon />
                                    <InterFont text='Bayar' type='Bold' style={{ color: Colors.primary }} />
                                </View>
                            )
                        }

                    }
                }}
                name="Pay" component={Pay} />
            <Tab.Screen options={{
                tabBarIcon: ({ focused }) => {
                    if (focused) {
                        return <View style={{ alignItems: 'center' }}>
                            <ProfileActiveIcon style={{ color: Colors.primary }} />
                            <InterFont text='Profile' type='Bold' style={{ color: Colors.primary }} />
                        </View>
                    } else {
                        return (
                            <View style={{ alignItems: 'center' }}>
                                <ProfileIcon />
                                <InterFont text='Profile' type='Bold' />
                            </View>
                        )
                    }

                }
            }} name="Profile" component={Profile} />
        </Tab.Navigator >
    )
}

export default MainPages
