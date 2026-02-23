<!DOCTYPE html>
<html>
<head>
    <title>New Contact Query</title>
</head>
<body>
    <h1>You have received a new message from the contact form:</h1>
    <p><strong>Name:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $data['message'] }}</p>
</body>
</html>
