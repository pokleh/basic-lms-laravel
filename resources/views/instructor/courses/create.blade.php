@extends('layouts.sidebar')
@section('content')
    <h3 class="page-title">@lang('module.courses.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['courses.store']]) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('module.create')
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('access-code', Lang::get('module.courses.fields.access_code'), ['class' => 'control-label']) !!}
                    {!! Form::text('access_code', old('access_code'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    @if($errors->has('access_code'))
                        <p class="help-block alert-danger">
                            {{ $errors->first('access_code') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('course-title', Lang::get('module.courses.fields.course'), ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    @if($errors->has('title'))
                        <p class="help-block alert-danger">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('assistant-professor', Lang::get('module.courses.fields.assistant_professor'), ['class' => 'control-label']) !!}
                    {!! Form::text('assistant_professor', old('assistant_professor'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    @if($errors->has('assistant_professor'))
                        <p class="help-block alert-danger">
                            {{ $errors->first('assistant_professor') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('desc', Lang::get('module.courses.fields.desc'), ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control ', 'placeholder' => '','resize' => 'none']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block alert-danger">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            {!! Form::label('excel-sheet', Lang::get('module.courses.fields.excel'), ['class' => 'control-label']) !!}
            {!! Form::file('file', null) !!}
            @if($errors->has('file'))
                <p class="help-block alert-danger">
                    {{ $errors->first('file') }}
                </p>
            @endif
        </div>

    </div>
    {!! Form::submit(trans('module.save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@endsection