@extends('layouts.app')

@section('content')

    <h1>Kadai新規作成ページ</h1>


     {!! Form::model($task, ['route' => 'tasks.store']) !!}
<div class="row">
             <div class="col-sm-offset-2 col-sm-5">
                <div class="form-group">
                    {!! Form::label('status', 'status:') !!}
                    {!! Form::text('status', null, ['class' => 'form-control']) !!}
                </div>
                    
                <div class="form-group">
                    {!! Form::label('content', 'contents:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
        
            {!! Form::close() !!}

@endsection

