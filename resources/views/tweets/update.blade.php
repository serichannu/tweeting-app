@include('header')

<body>
    <h1>つぶやきを編集する</h1>
    <div>
        <a href="{{ route('tweets.index') }}">&lt; 戻る</a>
        <p>投稿フォーム</p>
        @if (session('feedback.success'))
            <p style="color: green">{{ session('feedback.success') }}</p>
        @endif
        <form action="{{ route('tweets.update.put', ['tweetId' => $tweet->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="tweet-content">つぶやき</label>
            <span>140字まで</span>
            <textarea name="tweet" id="tweet-content" type="text" name="tweet" placeholder="つぶやきを入力">{{ $tweet->content }}</textarea>
            @error('tweet')
                <p style="color: red">{{ $message }}</p>
            @enderror
            <button type="submit">編集</button>
        </form>
    </div>
</body>
