@extends('layout.master')
@section('page-title')
	Register
@stop
@section('page-bg')
	form-3
@stop
@section('content')
<div class="form-page">
	<div class="form-inner draft-inner center small-12">
	<h1 class="form-title">@yield('page-title')</h1>
	{{ Form::open(array('url' =>'user/register','method' =>'POST')) }}
		{{ Form::label('email',"email")}}
		{{ Form::text('email',null,array(
		    'placeholder'      => 'steve@apple.com',
		))}}

		{{ Form::label('password'," password")}}
		{{ Form::password('password',null,array(
		    'placeholder'      => 'enter your password',
		))}}

		{{ Form::label('alias'," Full Name")}}
		{{ Form::text('alias',null,array(
		    'placeholder'      => 'Colm Wilkinson',
		))}}

		{{ Form::submit('register',array('class'=>'button'))}}
	{{ Form::close() }}

</div>
</div>
@stop