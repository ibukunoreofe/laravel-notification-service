<!DOCTYPE html>
<html>
<head>
    <title>Alert Notification</title>
</head>
<body>
<h1>Alert: {{ $alertTitle }}</h1>
<p>{{ $alertMessage }}</p>
<p>Stay safe,</p>
<p>The {{ config('app.name') }} Team</p>
</body>
</html>
