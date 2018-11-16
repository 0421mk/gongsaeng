@extends('layouts.master')

@section('content')
<div class="articleSection">
    <div class="textArticle">
        <div class="subject">
            공지사항
        </div>
        <div class="list">
            @foreach ($noticeDatas as $noticeData)
            <div class="content">
                <a href="/notice/{{ $noticeData->id }}">
                    <div class="title">
                        {{ $noticeData->title }}
                    </div>
                    <div class="admin">
                        관리자
                    </div>
                    <div class="date">
                        <?php
                            $date = $noticeData->dateTime;
                            echo substr($date, 0, -9);
                        ?>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
