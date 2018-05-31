@extends('layouts.app')

@section('content')

    <h1>Kadai新規作成ページ</h1>


    {!! Form::model($task, ['route' => 'tasks.store']) !!}

        {!! Form::label('title', 'タイトル:') !!}
        {!! Form::text('title') !!}

        {!! Form::label('content', 'メッセージ:') !!}
        {!! Form::text('content') !!}

        {!! Form::submit('投稿') !!}

    {!! Form::close() !!}

@endsection