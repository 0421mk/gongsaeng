<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/main/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main/style.css') }}">
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(request()->path()=='/')
        <meta name="description" itemprop="description" content='공생, gongsaeng, 스타트업, company, 유니버설 디자인 제품, universal design product, 식기, cutlery' />
        <meta name="keywords" itemprop="keywords" content='공생, gongsaeng, 스타트업, company, 유니버설 디자인 제품, universal design product, 식기, cutlery' />
    @endif

    @if(request()->path()=='/aboutUs')
        <meta name="description" itemprop="description" content='공생, gongsaeng, 스타트업, company, 유니버설 디자인 제품, universal design product, 식기, cutlery, 회사소개, about us' />
        <meta name="keywords" itemprop="keywords" content='공생, gongsaeng, 스타트업, company, 유니버설 디자인 제품, universal design product, 식기, cutlery, 회사소개, about us' />
    @endif

    @if(request()->path()=='/products')
        <meta name="description" itemprop="description" content='공생, gongsaeng, 스타트업, company, 유니버설 디자인 제품, universal design product, 식기, cutlery, 제품소개, products' />
        <meta name="keywords" itemprop="keywords" content='공생, gongsaeng, 스타트업, company, 유니버설 디자인 제품, universal design product, 식기, cutlery, 제품소개, products' />
    @endif

    @if(request()->path()=='/article/notice')
        <meta name="description" itemprop="description" content='공생, gongsaeng, 스타트업, company, 유니버설 디자인 제품, universal design product, 식기, cutlery, 공지사항, notice' />
        <meta name="keywords" itemprop="keywords" content='공생, gongsaeng, 스타트업, company, 유니버설 디자인 제품, universal design product, 식기, cutlery, 공지사항, notice' />
    @endif

    @if(request()->path()=='/article/story')
        <meta name="description" itemprop="description" content='공생, gongsaeng, 스타트업, company, 유니버설 디자인 제품, universal design product, 식기, cutlery, 스토리, story' />
        <meta name="keywords" itemprop="keywords" content='공생, gongsaeng, 스타트업, company, 유니버설 디자인 제품, universal design product, 식기, cutlery, 스토리, story' />
    @endif

    @if(request()->path()=='/article/mou')
        <meta name="description" itemprop="description" content='공생, gongsaeng, 스타트업, company, 유니버설 디자인 제품, universal design product, 식기, cutlery, 협약기관, mou' />
        <meta name="keywords" itemprop="keywords" content='공생, gongsaeng, 스타트업, company, 유니버설 디자인 제품, universal design product, 식기, cutlery, 협약기관, mou' />
    @endif

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Cinzel|Rokkitt" rel="stylesheet">

    <!-- Editor -->
    @if(request()->path()=='article/create')
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

        <!-- include summernote css/js -->
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    @endif

    @if(request()->path()=='article/update')
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

        <!-- include summernote css/js -->
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    @endif
</head>
<body>
    @include('layouts.partials.header')

    <div class="contents">
        @yield('content')
    </div>

    @include('layouts.partials.footer')
</body>
</html>
