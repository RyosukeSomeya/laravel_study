<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="/css/app.css" >
    <style>
        body {
            font-size: 16pt;
            color: #999;
            margin: 5px;
        }

        h1 {
            font-size: 50pt;
            text-align: right;
            color: #f6f6f6;
            margin: -20px 0 -30px 0;
            letter-spacing: -4pt;
        }

        ul {
            font-size: 12pt;
        }

        hr {
            margin: 25px 100px;
            border-top: 1px dashed #ddd;
        }

        .menutitle {
            font-size: 14pt;
            font-weight: bold;
            margin: 0px;
        }

        .content {
            margin: 10px;
        }

        .footer {
            text-align: right;
            font-size: 10pt;
            margin: 10px;
            border-bottom: solid 1px #ccc;
            color: #ccc;
        }
    </style>
</head>
<html>

<head>
    <title>Hello/index</title>
    <style>
        body {
            font-size: 16pt;
            color: #999;
        }

        h1 {
            font-size: 50pt;
            text-align: right;
            color: #f6f6f6;
            margin: -20px 0 -30px 0;
            letter-spacing: -4pt;
        }
        th {
            background: #999;
            color: #fff;
            padding: 5px 10px;
        }
        td {
            border: solid 1px #aaa;
            color: #999;
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <h1>@yield('title')</h1>

    @section('menubar')
    <ul>
        <p class="menutitle">※メニュー</p>
        <li>@show</li>
    </ul>
    <hr size="1">

    <div class="content">
        @yield('content')
    </div>
    <div class="footer">
        @yield('footer')
    </div>
</body>
</html>