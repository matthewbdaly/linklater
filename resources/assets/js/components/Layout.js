import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import LinkList from './LinkList';
import LinkInput from './LinkInput';
import LinkFilter from './LinkFilter';
import Bookmarklet from './Bookmarklet';

export default class Layout extends Component {
    render() {
        return (
            <div>
                <form>
                    <LinkInput {...this.props} />
                    <Bookmarklet {...this.props} />
                    <LinkFilter {...this.props} />
                    <LinkList {...this.props} />
                </form>
            </div>
        );
    }
}
