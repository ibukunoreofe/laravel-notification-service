<!DOCTYPE html>
<html>
<head>
    <title>News Update</title>
</head>
<body>
<h1>Latest News: {{ $newsTitle }}</h1>
<p>{{ $newsMessage }}</p>
<p>Read more on our website.</p>
<p>Best regards,</p>
<p>The {{ config('app.name') }} Team</p>
</body>
</html>
