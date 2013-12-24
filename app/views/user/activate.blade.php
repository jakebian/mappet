@extends('layout.master')
@section('page-title')
	Login
@stop

@section('page-bg')
	form-3
@stop

@section('content')

<div class="form-page">
	<div class="form-inner draft-inner center small-12">
	<h1>Are you ready?</h1>
	<p>click below to begin your adventure. </p>
	<a href={{"/user/activate/".$code}} class="big-button">activate</a>
</div>
</div>

</div>
@stop