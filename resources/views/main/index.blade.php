@extends('layouts.master')

@section('content')
<div class="greetSection">
    <div class="textBox">
        <p>귀한 방문 진심으로 감사드립니다.<br>
        저희는 모두가 더불어 사는<br>
        건강하고 행복한 사회를 만들어가는<br>
        ‘공생’입니다.</p>
        <a href="#ContactUs" class="contactBtn" id="move_contact">CONTACT US</a>
    </div>
</div>
<div class="companyDes">
    <div class="inBox">
        <img src="{{ asset('img/main/spoon.png') }}" alt="" class="spoon">
        <div class="vision">
            <img src="{{ asset('img/main/vision.png') }}" alt="">
            <div class="container">
                <div class="title">
                    VISION
                </div>
                <div class="text">
                    항상 사회의 필요한 부분에 관심을 가지고 있던 중 어느 자원봉사활동을
    통해 깨달은 것이 있습니다. 사회적 약자를 돕는 제가 알고보니 '감사의
    약자, 만족의 약자, 행복의 약자'였던 것입니다. 생활에서의 불편한 이들에게 삶의 감사와 만족, 행복을 느끼고 배웠습니다.
    저희는 기능적으로 유리한 이들에게는 더욱 편리한 생활과 보다 가치있는 삶을 전하고, 장애인을 비롯한 삶의 강자에게 배우는
    자세로 살기 좋은 공생사회를 만들고 싶습니다.
    저희 '공생'은 단지 그 다리가 되고자 합니다.
                </div>
            </div>
        </div>
        <div class="plan">
            <img src="{{ asset('img/main/plan.png') }}" alt="">
            <div class="container">
                <div class="title">
                    PLAN
                </div>
                <div class="text">
                    <span>장기계획</span>
    •온라인 유니버셜 디자인 제품 판매 쇼핑몰 플랫폼 [Co-Life] 준비중
    <br><br>
    <span>단기계획</span>
    •생활의 기본, 식생활의 공생을 위한 식기 [잇쉬와 잇샤]를 개발하고 제작
    •모든 사람을 위한 유니버셜, 즉 공생 디자인 적용
    •보다 공생적인 식문화 확산을 위해 외식산업으로의 복지형 식기유통 및
       인테리어 부분 시공을 계획중
    •이를 통해, 몸이 불편한 분들이 외식하기 좋은 곳을 충분하게 만드는
       것이 목표
    •이런 업체에게는 [공생마크]를 제공함으로 인증된 증표와 대외적인
       홍보를 지원 예정
                </div>
            </div>
        </div>
        <div class="message">
            <img src="{{ asset('img/main/message.png') }}" alt="">
            <div class="container">
                <div class="title">
                    MESSAGE
                </div>
                <div class="text">
                    •’공생열정’을 가지고 ‘공생임팩트’를 일으킬 인재,
    협력체를 구하고 있습니다.
    <br><br>
    부디 마음에 공감이 있다면, 마음을 전해 공유하며,
    마음을 모아 공생하길 원합니다.
    <br><br>
    언제든 어떠한 연락이라도 감사드리며 환영합니다.
    이 글을 보는 모든 분들에게 기쁨과 행복이 가득하길 축복합니다.
    <br><br>
    ‘공생’ 일동 올림
                </div>
            </div>
        </div>
    </div>
    <div class="productsWrap">
        <div class="title">
            PRODUCTS
        </div>
        <div class="contents">
            <ul>
                <li><img src="{{ asset('img/main/products_1.png') }}" alt=""></li>
                <li><img src="{{ asset('img/main/products_2.png') }}" alt=""></li>
                <li><img src="{{ asset('img/main/products_3.png') }}" alt=""></li>
            </ul>
            <ul>
                <li><img src="{{ asset('img/main/products_4.png') }}" alt=""></li>
                <li><img src="{{ asset('img/main/products_5.png') }}" alt=""></li>
                <li><img src="{{ asset('img/main/products_6.png') }}" alt=""></li>
            </ul>
        </div>
    </div>
    <div class="contactUs">
        <div class="title">
            CONTACT US
        </div>
        <ul class="first">
            <li><input type="text" id="contact_name" name="contact_name" placeholder="Name"></li>
            <li><input type="text" id="contact_email" name="contact_email" placeholder="Email"></li>
        </ul>
        <ul class="second">
            <li><textarea id="contact_message" name="contact_message" placeholder="Message" id="" cols="30" rows="10"></textarea></li>
        </ul>
        <ul class="third">
            <li>
                <input type="submit" value="SEND" id="mail_submit">
            </li>
        </ul>
    </div>
</div>
<script>
    $('#move_contact').click(function() {
        var offset = $('.contactUs').offset();

        $('html, body').animate({scrollTop : offset.top + - 100}, 1500, 'swing');
    });

    $('#mail_submit').click(function() {
        alert("문의를 성공적으로 완료했습니다.");
        var name = $('#contact_name').val();
        var email = $('#contact_email').val();
        var message = $('#contact_message').val();

        $.ajaxSetup({
           headers: {
               'X-XSRF-TOKEN': decodeURIComponent(/XSRF-Token=([^;]*)/ig.exec(document.cookie)[1])
           }
        });

        $.ajax({
            type: 'post',
            url: '/send/email',
            data: {
                name: name,
                email: email,
                message: message
            },
            dataType: 'json',
            success: function(result) {
                console.log(result.msg);
            }
        });

        location.reload();
    });
</script>
@endsection
