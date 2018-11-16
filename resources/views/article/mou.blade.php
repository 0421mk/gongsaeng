@extends('layouts.master')

@section('content')
<div class="articleSection">
    <div class="imgArticle">
        <div class="subject">
            협약 기관
        </div>
        <div class="list">
            @foreach ($mouDatas as $mouData)
            <div class="content">
                <a href="/mou/{{ $mouData->id }}">
                    <div class="img">
                        <?php
                            $string = $mouData->content;
                            preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $string, $matches);

                            echo $matches[0][0];
                        ?>
                    </div>
                    <div class="info">
                        <div class="title">
                            {{ $mouData->title }}
                        </div>
                        <div class="admin">
                            관리자
                        </div>
                        <div class="date">
                            <?php
                                $date = $mouData->dateTime;
                                echo substr($date, 0, -9);
                            ?>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            <script>
                $('.imgArticle .content').mouseover(function() {
                    $(this).find('.info').css('display', 'block');
                });
                $('.imgArticle .content').mouseleave(function() {
                    $(this).find('.info').css('display', 'none');
                });
            </script>
        </div>
    </div>
</div>
@endsection
