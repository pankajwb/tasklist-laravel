@extends('layouts.app')
@section('styles')
    <style>
        .create-new-link{
            padding: 15px;
            width:300px;
            border: 1px solid gray;
            background:aliceblue;
            margin: 10px;
            display:flex;
            justify-content: center;
        }
    </style>
@endsection
@section('title', 'Task list:')
@section('content')
    <div>
        <a class="create-new-link" href="{{ route('tasks.create') }}">Create New Task</a>
    </div>
    <div>
        @forelse ($tasks as $task )
        <div>
            <a href="{{ route('tasks.show',['task' => $task->id]) }}">{{ $task->title }}</a>
        </div>
        @empty
            <div>No Tasks</div>
        @endforelse


    </div>
@endsection




