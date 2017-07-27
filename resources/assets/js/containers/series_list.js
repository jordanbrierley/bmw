import React, { Component } from 'react';
import { connect } from 'react-redux';
import { fetchSeries } from '../actions/index';
import { Link } from 'react-router';
import ModelList from '../components/model_list';

class SeriesIndex extends Component{
	// fetch the series when the component is ran
	componentWillMount(){
		this.props.fetchSeries();
	}
	//  render the series
	renderSeries() {
		// loop through the series props
		return this.props.series.map((seriesItem) => {
			const models = seriesItem.models;
			return (
				<div className="series-list" key={seriesItem.id}>
        			<h2 className="series-list__title">{seriesItem.name}</h2>
					<ModelList data={models} />
        		</div>
			);
		});
	}

	render(){
		return(
			<div>
				{this.renderSeries()}
			</div>
		);
	}
}

function mapStateToProps(state) {
	return { series: state.series.all };
}

export default connect(mapStateToProps, { fetchSeries })(SeriesIndex);