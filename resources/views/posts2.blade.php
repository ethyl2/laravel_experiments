<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      padding-left: 2em;
    }
  </style>
  <title>Document</title>
</head>
<body>
  <h1>{{ $post->slug ?? ''}}</h1>
  <h2>{{ $post->body ?? ''}}</h2>
</body>
</html>
