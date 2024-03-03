@include('header')

<body>
    <h1>つぶやきアプリ</h1>
    <div>
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
    </div>
    <div>
        @foreach ($tweets as $tweet)
            <details>
                <summary>{{ $tweet->content }}</summary>
                <div>
                    <a href="{{ route('tweets.update.index', ['tweetId' => $tweet->id]) }}">編集</a>
                </div>
            </details>
        @endforeach
    </div>
</body>
</html>
