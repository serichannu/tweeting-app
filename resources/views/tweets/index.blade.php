@include('header')

<body>
    <h1>つぶやきアプリ</h1>
    @auth
        <div>
            <p>投稿フォーム</p>
            @if (session('feedback.success'))
                <p style="color: green">{{ session('feedback.success') }}</p>
            @endif

            <form action="{{ route('tweets.create') }}" method="POST">
                @csrf
                <label for="tweet-content">つぶやき</label>
                <span>140字まで</span>
                <textarea name="tweet" id="tweet-content" type="text" name="tweet" placeholder="つぶやきを入力"></textarea>
                @error('tweet')
                    <p style="color: red">{{ $message }}</p>
                @enderror
                <button type="submit">投稿</button>
            </form>
            <br>
        </div>
    @endauth

    <div>
        @foreach ($tweets as $tweet)
            <details>
                <summary>{{ $tweet->content }} by {{ $tweet->user->name }}</summary>
                @if (Auth::id() === $tweet->user_id)
                    <div>
                        <a href="{{ route('tweets.update.index', ['tweetId' => $tweet->id]) }}">編集</a>
                        <form action="{{ route('tweets.delete', ['tweetId' => $tweet->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">削除</button>
                        </form>
                    </div>
                @else
                    編集できません。
                @endif
            </details>
        @endforeach
    </div>
</body>
</html>
