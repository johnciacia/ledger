@extends('template')

@section('head')
<style>
	.row {
		background-color: transparent;
		font-family: 'Raleway', 'sans-serif';
	}

	.row h1 {
		font-size: 46px;
		color: #304252;
		font-weight: 400;
		line-height: 1em;
		text-transform: uppercase;
		letter-spacing: 2px;
	}

	.row h2 {
		font-size: 36px;
		color: #304252;
		font-weight: 300;
		line-height: 1em;
		text-transform: uppercase;
		letter-spacing: 2px;
		margin: 30px 0 30px 0;
	}

	.row p {
		font-weight: 400;
		font-size: 18px;
		line-height: 1.6em;
		color: #5F7589;
		width: 70%;
		display: table;
		margin: 0 auto;
		padding-bottom: 10px;
	}

	.row p a {
		padding: 10px 50px;
		margin: 20px;
	}
</style>
@stop


@section('content')
<div class="row text-center">
	<h1>Welcome to Ledger</h1>

	<h2>Flexible. Powerful. Customizable.</h2>
	<p>
		{{
		link_to( $url, 'Connect with Coinbase', array(
			'class' => 'btn btn-primary',
		) )
		}}

		{{
			link_to( '/login', 'Login', array(
				'class' => 'btn btn-default',
			) )
		}}
	</p>
</div>

<div class="row text-center">
	<img src="img/dashboard.png" class="img-rounded" width="700" />
</div>
@stop
