<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
            body {
                padding-left: 2em;
            }
        </style>
  <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
</head>
<body>
  <h1><?= htmlspecialchars($name, ENT_QUOTES) ?></h1>
  <h2><?= strrev(htmlspecialchars($name, ENT_QUOTES)) ?></h2>
  <h3>{{ $name}}</h3>
  <p>{{ strrev($name)}}</p>
</body>
</html>
