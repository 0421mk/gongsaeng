@extends('layouts.master')

@section('content')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    @include('surveys.partials.header')
    <script>
        $('.surveysHeader a:nth-child(2)').addClass("on");
        google.charts.load("current", {packages:["corechart"]});
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <div class="graphDetail">
        <div class="message">
            죄송합니다. 응답자가 아무도 없습니다.
        </div>
    </div>
@endsection
