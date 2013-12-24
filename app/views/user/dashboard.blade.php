@extends('layout.master')
@section('page-title')
	{{$user->alias}}
@stop

@section('header')
		<div class="change-cover">@include('user.dashboard-form.cover')</div>

<div class="">
		<h1 style={{"'background-image: url(".$user->cover_url.")'"}} class="dashboard-welcome">Welcome {{$user->alias}}</h1> </div>
@stop
@section('content')
<!-- data-0="background-position:0px 0px;" data-top-bottom="background-position:0px -200px;" -->



<div class="user-profile-inner top-pad inner center small-12">
	<section class="row bio-section-outer ">
	<div class="row">
	<div class="bio-section small-12 large-9">
	<div class="column small-12 large-2">
		<div class="dashboard-mugshot">
			<img id="mugshot" src={{$user->profile_url}}>
		</div>
		@include('user.dashboard-form.image')
	</div>

	<div class="column small-12 large-10">
		<p class="user-desc">{{$user->desc}}</p>
		@include('user.dashboard-form.text')
		<a href="" id="desc-edit" class="edit-button">edit</a>
	</div>
	</div>
	</div>
	</section>
<section class="row user-posts">
	@include('user.posts')->with('user',$user)	
</section>
</div>


@stop
