import React from 'react'
import { Router } from './config'
import store from './redux'
import { Provider } from 'react-redux'

const App = () => {
  return (
    <Provider store={store}>
      <Router />
    </Provider>
  )
}

export default App

