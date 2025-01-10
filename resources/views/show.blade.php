@extends('layouts.app')

@section('title', $task->title)


@section('content')

    <p>{{$task->description}}</p>
    @if ($task->long_description)
    <p>Long Description: {{$task->long_description}}</p>
    <p>Created at: {{ $task->created_at }}</p>
    <p>Updated at: {{ $task->updated_at }}</p>
    <div>
        <form action="{{ route('tasks.toggle' , ['task' => $task->id ]) }}" method="post">
            @csrf
            @method('PUT')
            <button type="submit">Mark as {{ $task->completed ? 'Uncomplete' : 'Complete' }}</button>
        </form>
    </div>
    <div>
        <form action="{{ route('tasks.destroy',['task' => $task->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Delete!</button>
        </form>
    </div>
    <div>
        <a href="{{ route('tasks.edit',['task' => $task->id]) }}">Edit Task</a>
         | <a href="{{ route('tasks.index') }}">Go to list</a>
    </div>
    @endif
@endsection
