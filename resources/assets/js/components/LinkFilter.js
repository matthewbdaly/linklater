// @flow
import React, { Component } from 'react';
import ReactDOM from 'react-dom';

type Props = {
  updateFilter: (filter: string) => void
};

export default class LinkFilter extends Component<Props> {
  filterRef: ?React.createRef<'input'>;
  clearRef: ?React.createRef<'button'>;
  updateFilter: () => void;
  clearFilter: () => void;
  constructor(props: Props) {
    super(props);
    this.filterRef = React.createRef();
    this.updateFilter = this.updateFilter.bind(this);
    this.clearRef = React.createRef();
    this.clearFilter = this.clearFilter.bind(this);
  }
  updateFilter(e: SyntheticEvent<HTMLInputElement>) {
    e.preventDefault();
    let filter = this.filterRef.current.value.trim();
    this.props.updateFilter(filter);
  }
  clearFilter(e: SyntheticEvent<HTMLButtonElement>) {
    e.preventDefault();
    this.filterRef.current.value = '';
    this.props.updateFilter('');
  }
  render() {
    return (
      <div className="form-group">
        <input id="linkfilter" placeholder="Filter links..." className="form-control" ref={this.filterRef} onChange={this.updateFilter} />
        <button id="clear" className="btn btn-primary" ref={this.clearRef} onClick={this.clearFilter}>Clear filter</button>
      </div>
    );
  }
}
