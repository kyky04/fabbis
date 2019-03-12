@extends('layouts.backend')

@section('body')
{{-- <div class="ui sidebar inverted vertical menu">
</div> --}}

<header>
	@include('partials.backend.header')
</header>

<div class="ui sidebar inverted visible vertical menu">
	@include('partials.backend.sidebar')
</div>

<div id="cover">
	<div class="ui active inverted dimmer">
		<div class="ui text loader">Loading</div>
	</div>
</div>
<div class="pusher content shown">
	<message></message>
	<div class="main ui fluid container" id="main-container">
		@yield('content')
	</div>

	@include('partials.backend.footer')
</div>
@endsection
