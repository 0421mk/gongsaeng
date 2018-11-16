@extends('layouts.master')

@section('content')
<div class="articleSection">
    <div class="writeWrap">
        <form action="/article/updatePerform" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$id}}">
            <input type="hidden" value="{{$category}}" name="category">
            <input type="text" class="titleInput" name="title" value="{{$title}}">
            <textarea id="summernote" class="editorInput" name="editordata">
                <?php echo $content; ?>
            </textarea>
            <input type="submit" value="수정하기">
            <script>
                $(document).ready(function() {
                    $('#summernote').summernote({
                        height: 270
                    });
                });
            </script>
        </form>
    </div>
</div>
@endsection
