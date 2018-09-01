// @flow
import {Map} from 'immutable';
import client from './client';
import gql from 'graphql-tag';
import type {Dispatch} from 'redux';
import type {Action} from './types';

export function addLink(content: string) {
  return {
    type: 'ADD_LINK',
    content: content
  };
}

const createLinkMutation = gql`
    mutation links ($link: String!) {
        createLink(link: $link) {
            id
            link
            title
        }
    }
`;

export function createLink(link: string) {
  return client.mutate({
    mutation: createLinkMutation,
    variables: {
      link: link
    }
  });
}

export function getLinks() {
  return client.query({
    query: gql`{
            links {
                id
                title
                link
            }}`
  });
}

export function storeLink(link: string) {
  return function (dispatch: Dispatch<Action>) {
    return createLink(link).then((response) => {
      dispatch(addLink(response.data.createLink));
    });
  };
}

export function updateFilter(content: string) {
  return {
    type: 'UPDATE_FILTER',
    content: content
  };
}
