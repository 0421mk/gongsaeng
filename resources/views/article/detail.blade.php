@extends('layouts.master')

@section('content')
<div class="articleSection">
    <div class="textArticle">
        <div class="subject">
            @foreach($detailDatas as $data)
                <?php
                    if($data->category == 'notice') {
                        echo "<a href='/notice'>공지사항</a>";
                    } else if ($data->category == 'story') {
                        echo "<a href='/story'>공생 스토리</a>";
                    } else if ($data->category == 'mou') {
                        echo "<a href='/mou'>협약 기관</a>";
                    }
                ?>
            @endforeach
        </div>
        <div class="detail">
            @foreach ($detailDatas as $data)
            <div class="subHeader">
                <div class="title">
                    {{ $data->title }}
                </div>
                <div class="admin">
                    관리자
                </div>
                <div class="date">
                    <?php
                        $date = $data->dateTime;
                        echo substr($date, 0, -9);
                    ?>
                </div>
            </div>
            <div class="content">
                <?php echo $data->content; ?>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
