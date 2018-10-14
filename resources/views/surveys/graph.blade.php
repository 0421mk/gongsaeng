@extends('layouts.master')

@section('content')
    @include('surveys.partials.header')
    <script>
        $('.surveysHeader a:nth-child(2)').addClass("on");
    </script>
    <div class="surveysIndex">
        @foreach ($surveyDatas as $surveyData)
        <div class="surveyBox">
            <a href="/graphs/{{ $surveyData->stId }}">
                <div class="stName">
                    {{ $surveyData->stName }}
                </div>
                <div class="stDev">
                    {{ $surveyData->stDev }}
                </div>
            </a>
        </div>
        @endforeach
    </div>
@endsection
