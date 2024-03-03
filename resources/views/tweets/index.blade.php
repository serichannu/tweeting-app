<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
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
            <p>{{ $tweet->content }}</p>
        @endforeach
    </div>
</body>
</html>
