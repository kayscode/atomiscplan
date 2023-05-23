<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,400;0,500;0,600;0,700;0,800;1,100;1,500;1,900&display=swap" rel="stylesheet">
    @vite("resources/css/app.css")
    <style>
        *{
            font-family: "Poppins",sans-serif;
            font-size: 13px;
        }
    </style>
</head>
<body class="h-screen text-gray-600">
    <div class="h-full flex flex-col">
        {{--  top navigation-bar  --}}
        <div class="border-b border-gray-200 py-3 px-3">
            @section("top-navigation")
            @show
        </div>

        {{-- left naivation and dashboard content container --}}
        <div class="h-full flex-1 grid grid-cols-10">
            <div class="col-span-2 bf-white border-r border-gray-200">
                @section("left-side-navigation")
                @show
            </div>
            <div class="col-span-8">
                @section("dashboard-main-content")
                @show
            </div>
        </div>
    </div>
</body>
</html>
