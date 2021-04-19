@extends('layout.bbslayout')
 @section('title', 'LaravelPjt BBS 投稿の一覧ページ')
@section('keywords', 'キーワード1,キーワード2,キーワード3')
@section('description', '投稿一覧ページの説明文')
@section('pageCss')
<link href="/css/bbs/style.css" rel="stylesheet">
@endsection
 
@include('layout.bbsheader')
 
@section('content')
<div class="mt-4 mb-4">
    <a href="{{ route('learn.create') }}" class="btn btn-primary">
        投稿の新規作成
    </a>
</div>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>カテゴリ</th>
            <th>作成日時</th>
            <th>名前</th>
            <th>件名</th>
            <th>メッセージ</th>
            <th>処理</th>
        </tr>
        </thead>
        <tbody id="tbl">
        @foreach ($learns as $learn)
            <tr>
                <td>{{ $learn->id }}</td>
                <td>{{ $learn->category->name }}</td>
                <td>{{ $learn->created_at->format('Y.m.d') }}</td>
                <td>{{ $learn->name }}</td>
                <td>{{ $learn->subject }}</td>
                <td>{!! nl2br(e(Str::limit($learn->message, 100))) !!}
                @if ($learn->progresses->count() >= 1)
                    <p><span class="badge badge-primary">コメント：{{ $learn->progresses->count() }}件</span></p>
                @endif
                </td>
                <td class="text-nowrap">
                    <p><a href="{{ action('LearnController@show', $learn->id) }}" class="btn btn-primary btn-sm">詳細</a></p>
                    <p><a href="" class="btn btn-info btn-sm">編集</a></p>
                    <p><a href="" class="btn btn-danger btn-sm">削除</a></p>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mb-5">
    {{ $learns->links() }}
    </div>
</div>
@if (session('learnstatus'))
    <div class="alert alert-success mt-4 mb-4">
        {{ session('learnstatus') }}
    </div>
@endif
@endsection
 
@include('layout.bbsfooter')