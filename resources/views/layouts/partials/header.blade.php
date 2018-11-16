<header class="mainHeader">
    <nav>
        <div class="logo">
            <a href="/"><img src="{{ asset('img/gongsaeng.png') }}" alt="공생 logo gongsaeng"></a>
        </div>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/aboutUs">About Us</a></li>
            <li class="productLi">
                <a href="/products">Product</a>
            </li>
            <li><a href="/notice">Notice</a></li>
            <li><a href="/story">Story</a></li>
            <li><a href="/mou">Mou</a></li>
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
