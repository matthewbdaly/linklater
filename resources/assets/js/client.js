import ApolloClient from 'apollo-boost';
import gql from 'graphql-tag';
import { createHttpLink } from 'apollo-link-http';
import { InMemoryCache } from 'apollo-cache-inmemory';

const httpLink = createHttpLink({
    uri: window.initialData.graphql_route,
    credentials: 'same-origin'
});

export default new ApolloClient({
    link: httpLink,
    cache: new InMemoryCache()
});

