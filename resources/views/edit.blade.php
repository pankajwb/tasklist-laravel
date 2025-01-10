@extends('layouts.app')

@section('title','Edit Task')

@section('styles')
    <style>
        .error{
            color:red;
            border:1px dotted red;
            padding : 5px;
            font-size: 0.8rem;
        }
        .success{
            color: green;
            border:1px dotted green;
            font-size: 0.8rem;
            padding: 5px;
        }
    </style>
@endsection

@section('content')

    <form action="{{ route('tasks.update',['task' => $task->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{$task->title}}">
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="5">{{$task->description}}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="long_description">Description</label>
            <textarea name="long_description" id="long_description" cols="30" rows="10">{{$task->long_description}}</textarea>
            @error('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit">Update</button>
        </div>
    </form>
@endsection
