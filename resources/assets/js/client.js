// @flow
import ApolloClient from 'apollo-boost';
import { createHttpLink } from 'apollo-link-http';
import { InMemoryCache } from 'apollo-cache-inmemory';

const httpLink = createHttpLink({
  uri: window.initialData.graphql_route,
});

export default new ApolloClient({
  link: httpLink,
  cache: new InMemoryCache(),
  request: async operation => {
    const token = window.initialData.jwt;
    operation.setContext({
      headers: {
        'Authorization': token ? `Bearer ${token}` : ''
      }
    });
  }
});
