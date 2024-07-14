@extends('layouts.app')

@section('content')
	<div class="flex flex-col justify-center items-center h-screen w-screen">
		<h1 style="font-size: 52px;">
			404
		</h1>
		<p>{{$msg}}</p>
		<a href="{{route('home')}}" class="text-orange-600">Home Page</a>
	</div>
@endsection
