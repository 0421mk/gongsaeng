@extends('layouts.master')

@section('content')
<div class="articleSection">
    <div class="writeWrap">
        <form action="/article/createPerform" method="post">
            @csrf
            <select class="category" name="category">
                <option value="notice">공지사항</option>
                <option value="story">공생스토리</option>
                <option value="mou">협약기관</option>
            </select>
            <input type="text" class="titleInput" placeholder="제목을 입력해주세요." name="title">
            <textarea id="summernote" class="editorInput" name="editordata"></textarea>
            <input type="submit" value="작성하기">
            <script>
                $(document).ready(function() {
                    $('#summernote').summernote({
                        placeholder: '내용을 입력해주세요.',
                        height: 270
                    });
                });
            </script>
        </form>
    </div>
</div>
@endsection
