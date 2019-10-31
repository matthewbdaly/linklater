// @flow
import React from 'react';

type Props = {
  createUrl: string
};

const Bookmarklet = (props: Props) => {
  const url = `javascript:location.href='${props.createUrl}?url='+encodeURIComponent(location.href)`;
  return (
    <p className="bookmarklet">
      <a href={url}>LinkLater This!</a>
    </p>
  );
};

export default Bookmarklet;
