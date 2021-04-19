@extends('layout.bbslayout')
 
@section('title', 'LaravelPjt BBS 投稿の詳細ページ')
@section('keywords', 'キーワード1,キーワード2,キーワード3')
@section('description', '投稿詳細ページの説明文')
@section('pageCss')
<link href="/css/bbs/style.css" rel="stylesheet">
@endsection
 
@include('layout.bbsheader')
 
@section('content')
<div class="mt-4 mb-4">
    <a href="{{ route('learn.index') }}" class="btn btn-info">
        一覧に戻る
    </a>
</div>
<div class="container mt-4">
    <div class="border p-4">
        <!-- 件名 -->
        <h1 class="h4 mb-4">
            {{ $learn->subject }}
        </h1>
 
        <!-- 投稿情報 -->
        <div class="summary">
            <p><span>{{ $learn->name }}</span> / <time>{{ $learn->updated_at->format('Y.m.d H:i') }}</time> / {{ $learn->category->name }} / {{ $learn->id }}</p>
        </div>
 
        <!-- 本文 -->
        <p class="mb-5">
            {!! nl2br(e($learn->message)) !!}
        </p>
 
        <section>
            <h2 class="h5 mb-4">
                コメント
            </h2>
 
            @forelse($learn->progresses as $progress)
                <div class="border-top p-4">
                    <time class="text-secondary">
                        {{ $progress->name }} / 
                        {{ $progress->created_at->format('Y.m.d H:i') }} / 
                        {{ $progress->id }}
                    </time>
                    <p class="mt-2">
                        {!! nl2br(e($progress->comment)) !!}
                    </p>
                </div>
            @empty
                <p>コメントはまだありません。</p>
            @endforelse
        </section>
    </div>
</div>
@endsection
 
@include('layout.bbsfooter')