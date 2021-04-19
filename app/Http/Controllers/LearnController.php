<?php

namespace App\Http\Controllers;
use App\Http\Requests\LearnRequest; // class宣言の外に追記
use Illuminate\Http\Request;
use App\Learn;

class LearnController extends Controller
{
    /**
     * 一覧
     */
    public function index()
    {
        $learns = Learn::orderBy('created_at', 'desc')->paginate(10);
        return view('learn.index', ['learns' => $learns]);
    }
    /**
     * 詳細
     */
    public function show(Request $request, $id)
    {
        $learn = Learn::findOrFail($id);
     
        return view('learn.show', [
            'learn' => $learn,
        ]);
    }
    
    /**
     * 投稿フォーム
     */
    public function create()
    {
        //return view('posts.create');　← 間違い
        return view('learn.create');
    }
    
     
    /**
     * バリデーション、登録データの整形など
     */
    public function store(LearnRequest $request)
    {
        $savedata = [
            'name' => $request->name,
            'subject' => $request->subject,
            'message' => $request->message,
            'category_id' => $request->category_id,
        ];
     
        $learn = new Learn;
        $learn->fill($savedata)->save();
     
        return redirect('/learn')->with('learnstatus', '新規作成しました。');
    }
}
