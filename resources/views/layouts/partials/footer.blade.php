<footer class="mainFooter">
    <div class="container">
        <div class="firstRow">
            <div class="enterEmail">
                <button>Enter Email<img src="{{ asset('img/main/arrow.png') }}" alt=""></button>
            </div>
            <div class="link">
                <span><a href="/">Home</a></span>
                <span><a href="/aboutUs">About us</a></span>
                <span><a href="/products">Product</a></span>
                <!-- <span><a href="">Survey</a></span> -->
            </div>
            <div class="logo">
                <img src="{{ asset('img/gongsaeng.png') }}" alt="">
            </div>
        </div>
    </div>
    <div class="line"></div>
    <div class="container">
        <div class="secondRow">
            <div class="left">
                대전 유성구 가정북로 96 B 104호  |  TEL 010-4446-5052  |  FAX 042-###-####
            </div>
            <div class="right">
                © GONG SAENG Corp. All rights reserved
            </div>
        </div>
    </div>
</footer>

@if(config('app.env') == 'local')
    <script src="http://localhost:35729/livereload.js"></script>
@endif
