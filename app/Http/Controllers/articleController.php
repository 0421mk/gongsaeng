<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use DB;

class articleController extends Controller
{
    public function hiddenWrite() {
        return view('article.hiddenWrite');
    }

    public function create(Request $request) {
        $checkId = 'gongsaeng4';
        $checkPw = 'asdf2331@@';

        $adminId = $request->adminId;
        $adminPw = $request->adminPw;

        if($checkId === $adminId && $checkPw === $adminPw) {
            return view('article.create');
        }else{
            return redirect('/');
        }
    }

    public function createPerform(Request $request) {
        $article = new Article();

        $article->category = $request->category;
        $article->title = $request->title;
        $article->content = $request->editordata;
        $article->dateTime = date("Y-m-d H:i:s");

        $article->save();

        return redirect('/article/success');
    }

    public function success() {
        return view('article.success');
    }

    //공지사항
    public function notice() {
        $noticeDatas = DB::table('articles')->where('category', 'notice')->orderBy('id', 'desc')->get();

        return view('article.notice', compact('noticeDatas'));
    }

    //공생스토리
    public function story() {
        $storyDatas = DB::table('articles')->where('category', 'story')->orderBy('id', 'desc')->get();

        return view('article.story', compact('storyDatas'));
    }

    //협약기관
    public function mou() {
        $mouDatas = DB::table('articles')->where('category', 'mou')->orderBy('id', 'desc')->get();

        return view('article.mou', compact('mouDatas'));
    }

    //디테일 동일
    public function detail($id) {
        $detailDatas = DB::table('articles')->where('id', $id)->get();

        return view('article.detail', compact('detailDatas'));
    }

    // 삭제
    public function delete($category, $id) {
        DB::table('articles')->where('id', $id)->delete();

        $url = '/' . $category;
        return redirect($url);
    }

    // 업데이트
    public function update($category, $id) {
        $articleData = DB::table('articles')->where('id', $id)->get();
        foreach($articleData as $data) {
            $date = $data->dateTime;
            $title = $data->title;
            $content = $data->content;
        }

        $datas = [
            'category' => $category,
            'id' => $id,
        ];

        return view('article.hiddenUpdate', $datas);
    }

    // 업데이트 Ex
    public function updateEx(Request $request) {
        $id = $request->id;

        $articleData = DB::table('articles')->where('id', $id)->get();
        foreach($articleData as $data) {
            $date = $data->dateTime;
            $title = $data->title;
            $content = $data->content;
            $category = $data->category;
        }

        $datas = [
            'category' => $category,
            'id' => $id,
            'title' => $title,
            'content' => $content,
            'date' => $date
        ];

        $checkId = 'gongsaeng4';
        $checkPw = 'asdf2331@@';

        $adminId = $request->adminId;
        $adminPw = $request->adminPw;

        if($checkId === $adminId && $checkPw === $adminPw) {
            return view('article.update', $datas);
        }else{
            return redirect('/');
        }
    }

    public function updatePerform(Request $request) {
        $id = $request->id;
        $article = Article::find($id);

        $article->title = $request->title;
        $article->content = $request->editordata;

        $article->save();

        return redirect('/article/success');
    }
}
