<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-assets.libs.important/>
    <title>{{env('APP_NAME')}}</title>
</head>
<body>
    <div id="app">
        <x-auth-navbar/>
        {{ $slot }}
    </div>
</body>
</html>