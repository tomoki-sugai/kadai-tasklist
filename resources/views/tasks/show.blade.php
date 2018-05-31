@extends('layouts.app')

@section('content')

    <h1>id = {{ $task->id }} のStatusの詳細ページ</h1>

    <p>Status: {{ $task->status }}</p>
    <p>Contents</p>: {{ $task->content }}</p>

    {!! link_to_route('tasks.edit', 'このContentsを編集', ['id' => $task->id]) !!}

    {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除') !!}
    {!! Form::close() !!}

@endsection