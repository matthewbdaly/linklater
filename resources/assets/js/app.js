
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
import {createStore} from 'redux';
import reducer from './reducer';
import {Provider} from 'react-redux';
import {fromJS} from 'immutable';
import ApolloClient from 'apollo-boost';
import gql from 'graphql-tag';

const client = new ApolloClient({
    uri: window.graphql_route
});
client.query({
    query: gql`{
        links {
            id
            title
            link
        }}`
}).then(result => console.log(result));
const store = createStore(
    reducer,
    fromJS(window.initialData),
    window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__()
);

if (document.getElementById('list')) {
    ReactDOM.render(
        <Provider store={store}>
            <Container />
        </Provider>,
        document.getElementById('list')
    );
}
