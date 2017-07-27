import React from 'react';

function average(data) {

	return data.map((modelItem) => {

		const mseries = modelItem.m_series;
		let mSeriesLabel;
		const image = modelItem.background_image_mobile;
		const name = modelItem.name;
		const link = modelItem.link;
		const series = modelItem.series;

		if (mseries == 1) {
			mSeriesLabel = <span className="mseries"></span>;
		}

		return (
			<div className="model-item" key={modelItem.id}>
				{mSeriesLabel}
				<div className="model-item__image">
					<img src={`/images/cars/${image}`} alt="" />
				</div>
				<div className="model-item__info">
					<p className="model-item__name">{name}</p>
					<a href={link} className="btn btn--primary">Find out more</a>
				</div>
			</div>
		);
	});
}

export default (props) => {
	return (
		<div className="model-list">
			{average(props.data)}
		</div>
	);
}