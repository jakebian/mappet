@extends('layout.master')
@section('page-title')
	Login
@stop

@section('page-bg')
	form-1
@stop

@section('content')

<div class="form-page">
	<div class="form-inner draft-inner center small-12 top-pad">
		<h1 class="form-title">Welcome back! Login here.</h1>
	{{ Form::open(array('url' =>'user/login','method' =>'POST')) }}
		{{ Form::label('email'," email")}}
		{{ Form::text('email',null,array(
		    'placeholder'      => 'enter your email',
		))}}

		{{ Form::label('password'," password")}}
		{{ Form::password('password',null,array(
		    'placeholder'      => 'enter your password',
		))}}
<!-- 		{{Form::checkbox('remember', true)}}
 -->
		{{ Form::submit('Login',array('class'=>'button'))}}

	{{ Form::close() }}
</div>

</div>
@stop