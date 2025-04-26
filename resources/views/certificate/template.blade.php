<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; text-align: center; padding: 50px; }
        .certificate { border: 10px solid #ccc; padding: 50px; }
        h1 { font-size: 40px; }
    </style>
</head>
<body>
    <div class="certificate">
        <h1>Certificate of Participation</h1>
        <p>This is to certify that</p>
        <h2>{{ $user->name }}</h2>
        <p>has successfully participated in the program.</p>
        <p>Date: {{ now()->format('d M, Y') }}</p>
    </div>
</body>
</html>
