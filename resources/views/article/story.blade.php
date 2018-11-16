@extends('layouts.master')

@section('content')
<div class="articleSection">
    <div class="imgArticle">
        <div class="subject">
            공생 스토리
        </div>
        <div class="list">
            @foreach ($storyDatas as $storyData)
            <div class="content">
                <a href="/story/{{ $storyData->id }}">
                    <div class="img">
                        <?php
                            $string = $storyData->content;
                            preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $string, $matches);

                            echo $matches[0][0];
                        ?>
                    </div>
                    <div class="info">
                        <div class="title">
                            {{ $storyData->title }}
                        </div>
                        <div class="admin">
                            관리자
                        </div>
                        <div class="date">
                            <?php
                                $date = $storyData->dateTime;
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
