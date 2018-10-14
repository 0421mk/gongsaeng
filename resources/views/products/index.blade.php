@extends('layouts.master')

@section('content')
<div class="productsIndex">
    <div class="intro">
        <img src="{{ asset('/img/product/first.png') }}" alt="">
        <div class="text">
            <p class="main">
                유아부터 어르신, 장애인까지 모두가 사용편리한
스푼&amp;포크 <b>“잇쉬&amp;잇샤”</b>
            </p>
            <p class="sub">
                스스로 먹기시작하는 어린아이부터<br>
손목이 불편한 어르신까지<br>
장애인과 장애가 없는 사람<br>
모두 사용하기 편리한 굿디자인
            </p>
        </div>
    </div>
    <div class="video">
        <div class="container">
            <div class="left">
                <div class="videoBox">
                    <iframe width="910" height="512" src="https://www.youtube.com/embed/kZ8jl-Ok6l4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
                <script type="text/javascript">
                  $(window).resize(function(){resizeYoutube();});
                  $(function(){resizeYoutube();});
                  function resizeYoutube(){ $("iframe").each(function(){ if( /^https?:\/\/www.youtube.com\/embed\//g.test($(this).attr("src")) ){ $(this).css("width","100%"); $(this).css("height",Math.ceil( parseInt($(this).css("width")) * 480 / 854 ) + "px");} }); }
                </script>
            </div>
            <div class="right">
                <div class="title">
                    히브리어 “잇쉬&잇샤”는<br>
    우리말로 “아담&이브”라는 뜻 입니다.
                </div>
                <div class="text">
                    “잇(eat)쉬&잇(eat)샤”는 최초의 인류로,<br>
    곧 모든 인류가 사용할 수 있는<br>
    스푼&포크 라는 의미에서 지어진 이름입니다.
                </div>
                <a href="#More" class="moreBtn">제품 더 보기</a>
            </div>
        </div>
    </div>
    <div class="banner">
        <img src="{{ asset('/img/product/second.png') }}" alt="">
    </div>
    <div class="titleTxt">
        <h1>제품 소개</h1>
        <h2>
            "잇쉬&잇샤"를 통해 손이 불편한 사람에게는 편리한 식사를,<br>
손이 불편하지 않은 사람에게는 유니크한 디자인을 선사합니다.
        </h2>
    </div>
    <div class="division">
        <h1>1. 유니버셜 굿우드그립 (두꺼운 그립)</h1>
        <h2>
            1. 제품 사용 시 좌측과 우측, 하단의 그립 가이드 홈이 그립감을 높여주며, 큰 힘을 들이지 않고 스푼 혹은 포크를 파지할 수 있습니다.<br>
2. 상단의 형태는 홈이 파이지 않는 형태로 주먹을 쥐었을 시 생기는 형태로 디자인하여 그립감과 고정감을 높여주었습니다.<br>
3. 스푼과 포크의 크기는 일반 어른용보다 작으므로, 입이 작은 사람과 어린 아이도 사용할 수 있습니다.
        </h2>
        <div class="imgWrap">
            <img src="{{ asset('/img/product/1_1.jpg') }}" alt="">
            <img src="{{ asset('/img/product/1_2.jpg') }}" alt="">
            <img src="{{ asset('/img/product/1_3.jpg') }}" alt="">
            <a href="#More" class="moreBtn">제품 더 보기</a>
        </div>
    </div>
    <div class="division">
        <h1>2. 유니버설 슬림우드그립(일반사이즈)</h1>
        <h2>
            1. 제품 사용 시 상단과 우측의 그립 가이드 홈이 그립감을 높혀 줌과 동시에 식기사용법의 교정효과를 줍니다.<br>
2. 제품의 하단부에 공간을 내어 어린아이과 같이 최초 제품 사용 시 혼자 쉽게 파지가 쉽습니다.<br>
3. 스푼과 포크의 크기는 일반 어른용보다 작으므로, 입이 작은 사람과 어린 아이도 사용할 수 있습니다.
        </h2>
        <div class="imgWrap">
            <img src="{{ asset('/img/product/2_1.jpg') }}" alt="">
            <img src="{{ asset('/img/product/2_2.jpg') }}" alt="">
            <img src="{{ asset('/img/product/2_3.jpg') }}" alt="">
            <a href="#More" class="moreBtn">제품 더 보기</a>
        </div>
    </div>
    <div class="division">
        <h1>3. 유니버설 스페셜우드그립(관절최소사용)</h1>
        <h2>
            1. 제품 사용 시 좌측의 홈과 우측의 그립 가이드 홈이 그립감을 한층 높여줍니다.<br>
2. 스푼과 포크가 제품의 편축(사용 시 안쪽)으로 최전돼있어 제품을 사용 할 시 팔꿈치를 최소한으로 굽혀 사용할 수 있습니다.<br>
3. 스푼과 포크의 크기는 일반 어른용보다 작으므로, 입이 작은 사람과 어린 아이도 사용할 수 있습니다.
        </h2>
        <div class="imgWrap">
            <img src="{{ asset('/img/product/3_1.jpg') }}" alt="">
            <img src="{{ asset('/img/product/3_2.jpg') }}" alt="">
            <img src="{{ asset('/img/product/3_3.jpg') }}" alt="">
            <a href="#More" class="moreBtn">제품 더 보기</a>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('.mainFooter').addClass("white");
});
</script>
@endsection
