@extends('layout')
@section('content')

<h1 class="title">{{project->name}}</h1>

<div class="content">{{ $project->name}}</div>


<div>

	@foreach ($project->tasks as $task)
		<li>{{ $task->name }}</li>
		@endforeach

	</div>

	<p>
		<a href="/projects/{{ $project->id}}/edit">edit</a>
	</p>

@endsection