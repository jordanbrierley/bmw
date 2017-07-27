import React from 'react';
import { Route, IndexRoute } from 'react-router';

import App from './components/app';
import SeriesIndex from './components/series_index';

export default (
	<Route path="/" component={App}>
		<IndexRoute component={SeriesIndex} />
	</Route>
);