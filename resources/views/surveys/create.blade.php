@extends('layouts.master')

@section('content')
@include('surveys.partials.header')
<script>
    $('.surveysHeader a:nth-child(3)').addClass("on");
</script>
<div class="surveysCreate">
    <input type="text" placeholder="설문지 이름을 입력하세요." id="surveyName">
    <textarea name="surveyDes" placeholder="설문지 설명" rows="2" cols="80" id="surveyDescription"></textarea>
    <div class="surveyPlusBox">
        <div class="plusBox">
            <div class="surveyBox" id="box1">
                <input type="text" class="questionInput" name="question1" id="question1" placeholder="1번째 질문을 입력해주세요.">
                <div class="answerList" id="number1">

                </div>
                <span class="optPlus" id="optPlus">객관식 옵션 추가</span>
                <span class="essayPlus" id="essayPlus">주관식 교체</span>
                <a href="#Next" id="nextBtn1">다음 질문으로 넘어가기</a>
            </div>
        </div>
        <div class="submit">
            <a href="#Submit" id="submitBtn">이 버튼을 누르면 설문지 작성을 완료합니다</a>
        </div>
        <script>
            var nowNum = 1;
            // nowNum 은 answer 추가할 때 가지는 id값에 사용
            var nowOptNum = 1;
            // nowOptNum 은 nowNum id값을 기준으로 생성된 option에 번호를 매김

            var essayCheck = false;
            // 주관식인지 체크

            var totalQArray = new Array;
            var totalAArray = new Array;

            // 문자열 프로토 타입 함수 {숫자} 를 파라미터 순서대로 교체한다.
        	String.prototype.format = function(){
        		var args = arguments;

        		return this.replace(/{(\d+)}/g, function(match, number){
        			return typeof args[number] != 'undefined'
        				? args[number]
        				: match
        				;
        		});
        	}

            $(document).ready(function() {
                $('#box' + nowNum + ' #optPlus').click(function() {
                    if(essayCheck == true) {
                        $('#box' + nowNum +  ' .answerList').empty();
                    }
                    essayCheck = false;

                    $('#box' + nowNum +  ' .answerList').append(answerCreater(nowOptNum));
                    nowOptNum++;
                });

                $('#box' + nowNum + ' #essayPlus').click(function() {
                    nowOptNum = 1;
                    essayCheck = true;
                    $('#box' + nowNum +  ' .answerList').empty().append("<div class='notice'>이 질문은 주관식 질문입니다.</div>");
                });

                $('#submitBtn').click(function(){
                    // Submit 전 유효성 검사
                    var surveyName = $('#surveyName').val();
                    var surveyDescription = $('#surveyDescription').val();
                    // li 개수
                    var liLength = $(this).parent().siblings('.plusBox').find('.surveyBox .answerList li').length;
                    var liValArray = new Array;
                    var errorCheck;

                    var questionVal = $(this).parent().siblings('.plusBox').find('.questionInput').val();
                    if(surveyName == "" || surveyName == null) {
                        errorCheck = true;
                    }
                    if(surveyDescription == "" || surveyDescription == null) {
                        errorCheck = true;
                    }
                    if(questionVal == "" || questionVal == null) {
                        errorCheck = true;
                    }
                    if(liLength == 0){
                        if(essayCheck == true){
                            liValArray.push("asdfasdf23333");
                        }else{
                            alert("객관식이면 옵션을 추가해서 입력해주시기 바랍니다.");
                            return false;
                        }
                    }else{
                        for(var i = 1; i <= liLength; i++) {
                            var liVal = $(this).parent().siblings('.plusBox').find('.surveyBox .answerList li:nth-child(' + i + ') input').val();
                            liValArray.push(liVal);
                        }
                    }

                    for(var i = 0; i < liLength; i++) {
                        if(liValArray[i] == "" || liValArray[i] == undefined) {
                            errorCheck = true;
                        }
                    }

                    if(errorCheck) {
                        alert('입력되지 않은 값이 있습니다.');
                    }else{
                        totalAArray.push(liValArray);
                        totalQArray.push(questionVal);

                        $.ajaxSetup({
                           headers: {
                               'X-XSRF-TOKEN': decodeURIComponent(/XSRF-Token=([^;]*)/ig.exec(document.cookie)[1])
                           }
                        });

                        $.ajax({
                            type: 'post',
                            url: '/surveys',
                            data: {
                                stName: surveyName,
                                stDev: surveyDescription,
                                answerArray: totalAArray,
                                questionArray: totalQArray
                            },
                            dataType: 'json',
                            success: function(result) {
                                $('.surveysCreate').empty().append(result.msg);
                            }
                        });
                    }
                });
            });

            function answerCreater(num) {
                var li = $('<li />', {

                });
                var questionName = $('<input />', {
                    type: 'text',
                    placeholder: '옵션 입력',
                    name: 'answer' + nowNum + '_' + nowOptNum,
                }).appendTo(li);
                var delBtn = $('<span />', {
                    class: 'delBtn',
                    id: 'delete' + nowNum + '_' + nowOptNum,
                    click: function(e){
                		$(this).parent().remove();
                	}
                }).appendTo(li);

                return li;
            }

            function plusContents(number) {
                $.ajaxSetup({
                   headers: {
                       'X-XSRF-TOKEN': decodeURIComponent(/XSRF-Token=([^;]*)/ig.exec(document.cookie)[1])
                   }
               });

                $.ajax({
                    type: 'post',
                    url: '/surveys/ajaxControl',
                    data: {
                        num: number,
                    },
                    dataType: 'json',
                    success: plusSuccess
                });
            }

            function plusSuccess(data, status) {
                var template = $('#plusTemplate').html();
                var templateFormat = template.format(data.val);

                $('.plusBox').empty();
                $('.plusBox').append(templateFormat);
            }

            $('#nextBtn1').click(function(){
                // NEXT 전 유효성 검사

                // li 개수
                var liLength = $(this).parent().find('li').length;
                var liValArray = new Array;
                var errorCheck;

                var questionVal = $(this).siblings('input').val();
                if(questionVal == "") {
                    errorCheck = true;
                }

                if(liLength == 0){
                    if(essayCheck == true){
                        liValArray.push("asdfasdf23333");
                    }else{
                        alert("객관식이면 옵션을 추가해서 입력해주시기 바랍니다.");
                        return false;
                    }
                }else{
                    for(var i = 1; i <= liLength; i++) {
                        var liVal = $(this).parents().find('li:nth-child(' + i + ') input').val();
                        liValArray.push(liVal);
                    }
                }

                for(var i = 0; i < liLength; i++) {

                    if(liValArray[i] == "" || liValArray[i] == undefined) {
                        errorCheck = true;
                    }
                }

                if(errorCheck) {
                    alert('입력되지 않은 값이 있습니다.');
                }else{
                    nowNum++;

                    plusContents(nowNum);
                    totalAArray.push(liValArray);
                    totalQArray.push(questionVal);
                }
            });
        </script>
        <script type="text/template" id="plusTemplate">
            <div class="surveyBox" id="box{0}">
                <input type="text" class="questionInput" name="question{0}" id="question{0}" placeholder="{0}번째 질문을 입력해주세요.">
                <div class="answerList" id="number{0}">

                </div>
                <span class="optPlus" id="optPlus">객관식 옵션 추가</span>
                <span class="essayPlus" id="essayPlus">주관식 교체</span>
                <a href="#Next" id="nextBtn{0}">다음 질문으로 넘어가기</a>
            </div>

            <script>
                nowOptNum = 1;

                $('#box' + {0} + ' #optPlus').click(function() {
                    if(essayCheck == true) {
                        $('#box' + nowNum +  ' .answerList').empty();
                    }
                    essayCheck = false;

                    $('#box' + {0} +  ' .answerList').append(answerCreater(nowOptNum));
                    nowOptNum++;
                });

                $('#box' + {0} + ' #essayPlus').click(function() {
                    nowOptNum = 1;
                    essayCheck = true;
                    $('#box' + {0} +  ' .answerList').empty().append("<div class='notice'>이 질문은 주관식 질문입니다.</div>");
                });


                $('#nextBtn' + {0}).click(function(){
                    // NEXT 전 유효성 검사

                    // li 개수
                    var liLength = $(this).parent().find('li').length;
                    var liValArray = new Array;
                    var errorCheck;

                    var questionVal = $(this).siblings('input').val();
                    if(questionVal == "") {
                        errorCheck = true;
                    }

                    if(liLength == 0){
                        if(essayCheck == true){
                            liValArray.push("asdfasdf23333");
                        }else{
                            alert("객관식이면 옵션을 추가해서 입력해주시기 바랍니다.");
                            return false;
                        }
                    }else{
                        for(var i = 1; i <= liLength; i++) {
                            var liVal = $(this).parents().find('li:nth-child(' + i + ') input').val();
                            liValArray.push(liVal);
                        }
                    }

                    for(var i = 0; i < liLength; i++) {

                        if(liValArray[i] == "" || liValArray[i] == undefined) {
                            errorCheck = true;
                        }
                    }

                    if(errorCheck) {
                        alert('입력되지 않은 값이 있습니다.');
                    }else{
                        nowNum++;

                        plusContents(nowNum);
                        totalAArray.push(liValArray);
                        totalQArray.push(questionVal);
                    }
                });
            </script>
        </script>
    </div>
</div>
@endsection
