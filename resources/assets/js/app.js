
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
import { createHttpLink } from 'apollo-link-http';
import { setContext } from 'apollo-link-context';
import { InMemoryCache } from 'apollo-cache-inmemory';

const httpLink = createHttpLink({
    uri: window.initialData.graphql_route
});

const authLink = setContext((_, { headers }) => {
    const token = window.initialData.jwt;
    // return the headers to the context so httpLink can read them
    return {
        headers: {
            ...headers,
            authorization: token ? `Bearer ${token}` : "",
        }
    }
});

const client = new ApolloClient({
    link: authLink.concat(httpLink),
    cache: new InMemoryCache()
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
