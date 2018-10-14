<!-- <div class="advertisement">
    공생 제품 [잇쉬&잇샤] 크라우드 펀딩 모집 !
</div> -->
<header class="mainHeader">
    <nav>
        <div class="logo">
            <a href="/"><img src="{{ asset('img/gongsaeng.png') }}" alt=""></a>
        </div>
        <ul>
            <li><a href="/">HOME</a></li>
            <li><a href="/aboutUs">ABOUT US</a></li>
            <li class="productLi">
                <a href="/products">PRODUCT</a>
            </li>
            <li><a href="/surveys">SURVEY</a></li>
        </ul>
    </nav>
    <script>
        $('.productLi').hover(function() {
            $(this).find('.list').addClass("on");
        }, function() {
            $(this).find('.list').removeClass("on");
        });
    </script>
</header>