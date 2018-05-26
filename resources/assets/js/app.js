// @flow
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import LinkList from './components/LinkList';
import React from 'react';
import ReactDOM from 'react-dom';
import {Container} from './container';
import {createStore, applyMiddleware} from 'redux';
import { composeWithDevTools } from 'redux-devtools-extension/developmentOnly';
import reducer from './reducer';
import {Provider} from 'react-redux';
import {fromJS} from 'immutable';
import thunk from 'redux-thunk';

const store = createStore(
  reducer,
  fromJS(window.initialData),
  composeWithDevTools(
    applyMiddleware(thunk)
  )
);

if (document.getElementById('list')) {
  ReactDOM.render(
    <Provider store={store}>
      <Container />
    </Provider>,
    document.getElementById('list')
  );
}
