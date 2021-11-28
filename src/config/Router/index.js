import React from 'react'
import { StatusBar } from 'react-native'
import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import {
    SplashScreen,
    Register,
    Login,
    MainPages,
    ProductDetail
} from '../../pages'
import { Colors } from '../../utils'


const Stack = createNativeStackNavigator();

const Router = () => {
    return (
        <NavigationContainer >
            <StatusBar
                backgroundColor={Colors.primary}
                barStyle='light-content'
            />
            <Stack.Navigator screenOptions={{ headerShown: false }} initialRouteName="SplashScreen">
                <Stack.Screen name="SplashScreen" component={SplashScreen} />
                <Stack.Screen name="Register" component={Register} />
                <Stack.Screen name="Login" component={Login} />
                <Stack.Screen name="MainPages" component={MainPages} />
                <Stack.Screen name="ProductDetail" component={ProductDetail} />
            </Stack.Navigator>
        </NavigationContainer>
    )
}

export default Router

