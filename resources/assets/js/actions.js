import {Map} from 'immutable';
import client from './client';
import gql from 'graphql-tag';

export function addLink(title, link) {
    return {
        type: 'ADD_LINK',
        content: {
            title: title,
            link: link
        }
    };
}

const createLinkMutation = gql`
    mutation links ($link: String!) {
        createLink(link: $link) {
            title
            link
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
        });
    }
}
