@extends('layouts.app')

@section('title', trans('manager.humanresource.index.title'))
@section('subtitle', trans('manager.humanresource.index.subtitle'))

@section('content')
<style>
	.message {
		text-align: center;
		padding: 50px 0;
	}
	.message svg {
		opacity: 0.2;
		width: 80px;
	}
	.message svg path {
		fill : #3c8dbc;
	}
</style>
<div class="container-fluid">
    <div class="col-md-6 col-md-offset-3">

		@if (!empty($business->humanresources))
			<div class="message">
				@include('svg.staff_empty')
				<h2>{{ trans('manager.humanresource.index.empty_title') }}</h2>
				<p>{{ trans('manager.humanresource.index.empty_text') }}</p>
			</div>
		@endif

        {!! Alert::info(trans('manager.humanresource.index.instructions')) !!}

        <div class="panel panel-default">

            <div class="panel-heading">{{ trans('manager.humanresource.index.title') }}</div>

            <div class="panel-body">

                @foreach ($business->humanresources as $humanresource)
                <p>
                    <div class="btn-group">
                        {!! Button::normal()
                            ->withIcon(Icon::edit())
                            ->asLinkTo(route('manager.business.humanresource.edit', [$business, $humanresource->id]) ) !!}

                        {!! Button::normal($humanresource->name)
                            ->asLinkTo( route('manager.business.humanresource.show', [$business, $humanresource->id]) ) !!}
                    </div>
                </p>
                @endforeach
                
            </div>

            <div class="panel-footer">
                {!! Button::primary(trans('manager.humanresource.btn.create'))
                    ->withIcon(Icon::plus())
                    ->asLinkTo( route('manager.business.humanresource.create', [$business]) )
                    ->block() !!}
            </div>

        </div>

    </div>
</div>
@endsection
