@extends('layouts.master')

@section('content')
    @include('surveys.partials.header')
    <script>
        $('.surveysHeader a:nth-child(1)').addClass("on");
    </script>
    <div class="surveyContainer">
        <form action="/surveys/{{ $id }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="post">
            <input type="hidden" name="stId" value="{{ $id }}">
            <div class="stName">
                {{ $name }}
            </div>
            <div class="stDev">
                <?=$description?>
            </div>
            <div class="rowContainer">
                @for ($i = 0; $i < count($questions); $i++)
                    <div class="row">
                        <div class="question">
                            {{ $questions[$i] }}
                        </div>
                        <div class="answers">
                            @for ($j = 0; $j < count($answers[$i]); $j++)
                                <div class="answer">
                                    @if ($answers[$i][$j] === "asdfasdf23333")
                                        <textarea class="row_text" rows="8" cols="80"></textarea>
                                    @else
                                        <label for="checkBox{{$i+1}}_{{$j+1}}"><i class="far fa-square fa-2x"></i></label>
                                        <input type="checkbox" id="checkBox{{$i+1}}_{{$j+1}}" class="row_checkbox" value="{{$j+1}}">
                                        <span class="text">{{ $answers[$i][$j] }}</span>
                                    @endif
                                </div>
                            @endfor
                        </div>
                    </div>
                @endfor
            </div>
            <input type="hidden" name="dataString" id="dataString" value="">
            <script>
                $('.row_checkbox').click(function() {
                    $(this).parents('.answers').find('.answer input').prop('checked', false);
                    $(this).prop('checked', true);

                    var checkboxName = $(this).attr('id');
                    $(this).parents('.answers').find('.answer label').html('<i class="far fa-square fa-2x"></i>');

                    if($(this).is(":checked")) {
                        $("label[for="+checkboxName+"]").html('<i class="fas fa-check-square fa-2x"></i>');
                    }else{
                        $("label[for="+checkboxName+"]").html('<i class="far fa-square fa-2x"></i>');
                    }
                });
            </script>
            <div class="submitCon">
                <input type="submit" value="이 버튼을 누르면 설문지 응답을 완료합니다">
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('.submitCon input').click(function() {
                var rowLength = $('.rowContainer .row').length;
                var dataString = "";
                for(var i = 1; i <= rowLength; i++) {
                    var answerLength = $('.rowContainer .row:nth-child(' + i + ') .answers .answer').length;

                    if(answerLength == 1) {
                        var textCheck = $('.rowContainer .row:nth-child(' + i + ') .answers .answer').find('textarea').length;

                        if(textCheck == 1) {
                            // 텍스트일 때
                            var data = $('.rowContainer .row:nth-child(' + i + ') .answers .answer').find('textarea').val();
                            if(i != rowLength) {
                                dataString += data;
                                dataString += "@@@";
                            }else{
                                dataString += data;
                            }
                        } else {
                            // 객관식이고 옵션이 하나일 때
                            var data = $('.rowContainer .row:nth-child(' + i + ') .answers .answer').find('input').val();
                            if(i != rowLength) {
                                dataString += data;
                                dataString += "@@@";
                            }else{
                                dataString += data;
                            }
                        }
                    } else {
                        // 객관식일때 데이터
                        for(var j = 1; j <= answerLength; j++) {
                            var checked = $('.rowContainer .row:nth-child(' + i + ') .answers .answer:nth-child(' + j + ')').find('.row_checkbox').prop('checked');
                            var data = $('.rowContainer .row:nth-child(' + i + ') .answers .answer:nth-child(' + j + ')').find('.row_checkbox').val();
                            if(checked) {
                                if(i != rowLength) {
                                    dataString += data;
                                    dataString += "@@@";
                                }else{
                                    dataString += data;
                                }
                            }
                        }
                    }
                }

                $('#dataString').val(dataString);
            });
        });
    </script>
@endsection
