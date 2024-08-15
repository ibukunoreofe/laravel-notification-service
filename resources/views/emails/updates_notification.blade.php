<!DOCTYPE html>
<html>
<head>
    <title>Update Notification</title>
</head>
<body>
<h1>Important Update: {{ $updateTitle }}</h1>
<p>{{ $updateMessage }}</p>
<p>Thank you for your attention.</p>
<p>Sincerely,</p>
<p>The {{ config('app.name') }} Team</p>
</body>
</html>
