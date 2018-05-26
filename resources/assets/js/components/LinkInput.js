// @flow
import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class LinkInput extends Component {
  constructor(props) {
    super(props);
    this.inputRef = React.createRef();
    this.submitLink = this.submitLink.bind(this);
  }
  submitLink(e: SyntheticEvent<HTMLButtonElement>) {
    e.preventDefault();
    let link = this.inputRef.current.value.trim();
    if (link) {
      this.props.storeLink(link);
      this.inputRef.current.value = '';
    }
  }
  render() {
    return (
      <div className="form-group">
        <label htmlFor="url" className="control-label">URL</label>
        <input type="url" name="url" placeholder="Page to save" className="form-control" required autoComplete="off" ref={this.inputRef}></input>
        <button type="submit" className="btn btn-primary" onClick={this.submitLink}>
          Submit
        </button>
      </div>
    );
  }
}
