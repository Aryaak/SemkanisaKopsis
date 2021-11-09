import React from 'react'
import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import { Home, Pay, Profile, SplashScreen } from '../../pages'


const Stack = createNativeStackNavigator();

const Router = () => {
    return (
        <NavigationContainer >
            <Stack.Navigator screenOptions={{ headerShown: false }} initialRouteName="SplashScreen">
                <Stack.Screen name="SplashScreen" component={SplashScreen} />
                <Stack.Screen name="Home" component={Home} />
                <Stack.Screen name="Pay" component={Pay} />
                <Stack.Screen name="Profile" component={Profile} />
            </Stack.Navigator>
        </NavigationContainer>
    )
}

export default Router

