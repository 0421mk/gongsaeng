@extends('layouts.master')

@section('content')
    @include('surveys.partials.header')
    <script>
        $('.surveysHeader a:nth-child(1)').addClass("on");
    </script>
    <div class="surveysResult">
        <div class="message">
            설문지 작성을 완료했습니다.
        </div>
    </div>
@endsection
