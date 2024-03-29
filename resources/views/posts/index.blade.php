@extends('layout')

@section('content')
    <div class="container mt-4">
        @foreach ($posts as $post)
            <div class="card mb-4">
                <div class="card-header ">
                    {{ $post->title }}
                </div>
                <div class="card-body">
                    <p class="card-text">
                    {!!nl2br(e(str_limit($post->body, 200)) ) !!}
                    </p>

                    <a class="card-link" href="{{route('posts.show',['post'=>$post])}}">
                      続きを読む
                    </a>

                </div>
                <div class="card-footer">
                    <span class="mr-2">
                        投稿日時 {{ $post->created_at->format('Y.m.d') }}
                    </span>

                    @if ($post->comments->count())
                        <span class="badge badge-primary">
                            コメント {{ $post->comments->count() }}件
                        </span>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    <div class="m-4">
      <a href="{{route('posts.create')}}" class="btn btn-primary">
        投稿を新規作成する
      </a>
    </div>
    <div  class="mx-auto" style="width: 200px;">
    <p class="ml-4 badge badge-primary">ページリンク</p>
    {{ $posts->links() }}
    </div>
@endsection
