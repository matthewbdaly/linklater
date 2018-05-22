import {Map} from 'immutable';
import client from './client';
import gql from 'graphql-tag';

export function addLink(content) {
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

export function createLink(link) {
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

export function storeLink(link) {
    return function (dispatch) {
        return createLink(link).then((response) => {
            dispatch(addLink(response.data.createLink));
        });
    }
}

export function updateFilter(content) {
    return {
        type: 'UPDATE_FILTER',
        content: content
    };
}
