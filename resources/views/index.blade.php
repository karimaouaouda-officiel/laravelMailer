<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-assets.libs.important/>
    <title>Document</title>
</head>

<body>
    <div id="app">
        <x-parts.navbar />
        <div class="container-fluid d-flex flex-column align-items-center justify-content-center" style="height: 91.5vh;">
            <div class="container">
                <h1 class="display-2 fw-bold w-100 text-center" style="letter-spacing: 2px;">
                    Hello to <span class="text-primary">laravelMailer</span>
                </h1>
            </div>
            <div class="container mt-3">
                <h3 class="display-4 w-100 text-center">
                    do less send more
                </h3>
            </div>
            <a href="{{route('register')}}" class="btn btn-primary my-5">
                start now !
            </a>
        </div>
    </div>
</body>

</html>