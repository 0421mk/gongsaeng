@extends('layouts.master')

@section('content')
<div class="checkAdminWrap">
    <div class="gateWrap">
        <h1>잠시 관리자 검문이 있겠습니다.</h1>
        <form method="post" action="/article/update">
            @csrf
            <input type="hidden" name="id" value="{{$id}}">
            <input type="text" name="adminId" placeholder="관리자 아이디를 입력해주세요">
            <input type="password" name="adminPw" placeholder="관리자 비밀번호를 입력해주세요">
            <input type="submit" value="제출하기" class="submitBtn">
        </form>
    </div>
</div>
@endsection
