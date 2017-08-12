@extends('layouts.sidebar')
@section('content')
    @if(Auth::user()->isInstructor())
        <link href="{{ asset('css/instructor/instructor_homa_page_style.css') }}" rel="stylesheet">

        <a href="{{route('courses.create')}}" class="btn btn-success create_btn">
            @lang('module.addnew')
        </a>
        <br>
        <br>
        @if( count($courses ) > 0)
            <div class="row" style="margin-bottom:10px;">
                <div class="col-md-12">
                    <div class="row">
                        @foreach($courses as $course)
                            <div class="col-md-4 col-sm-4" style="margin-top: 10px;">
                                <div class="pricingTable">
                                    <div class="pricingTable-header" style="background-color:rgb(182,150,233);">
                                        <h3 style="color:rgb(255,254,254);">{{$course->title}}</h3><span
                                                style=" color:rgb(55,55,55);font-size:14px;
                        ">{{$course->access_code}}</span>
                                    </div>
                                    <div class="pricingContent">
                                        <ul>
                                            <li><strong>{{$course->description}}</strong></li>
                                            @if(count($course->quizzes) > 0)
                                                @foreach ($course->quizzes as $quiz)
                                                    <li style="background-color:rgb(239,239,237);"><a
                                                                href="{{route('quizzes.show',$quiz->id)}}">{{$quiz->title}}</a>
                                                    </li>
                                                @endforeach
                                            @else
                                                <li style="background-color:rgb(239,239,237);">@lang('module.courses.no-quizzes')</li>
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="pricingTable-sign-up">
                                        {{ Form::open(['method' => 'DELETE', 'route' => ['courses.destroy', $course->id]]) }}
                                        {{ Form::submit('DROP', ['class' => 'btn btn-danger']) }}
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @else
            <h1 class="display-1">@lang('module.no_entries_in_table')</h1>
        @endif
    @else

    @endif
@endsection