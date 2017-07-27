@extends('layouts.app')

@section('banner')
	<div class="banner">
		<div class="banner_caption">
			<img src="{{ url('images/logo.svg') }}" alt="" class="banner__logo">
			<h1 class="banner__title">BMW Series</h1>
		</div>

	</div>

@endsection

@section('content')

	<!-- @if($series)
      @foreach ($series as $seriesItem)
      	<div class="series-list">
        	<h2 class="series-list__title">{{ $seriesItem->name }} @if($seriesItem->models)({{ count($seriesItem->models) }} models)@endif</h2>


	        @if($seriesItem->models)
				<div class="model-list">
				@foreach ($seriesItem->models as $model)
					<div class="model-item">
			            @if($model->m_series)
			              <span class="mseries"></span>
			            @endif
						<div class="model-item__image">
							<img src="/images/cars/{{ $model->background_image_mobile }}" alt="">
						</div>
						<div class="model-item__info">
							<p class="model-item__name">{{ $model->series }} {{ $model->name }}</p>
							<a href="{{ $model->link }}" class="btn btn--primary">Find out more</a>
						</div>
					</div>
				@endforeach
				</div>
			@endif
      	</div>

      @endforeach
  @endif  -->

@endsection


