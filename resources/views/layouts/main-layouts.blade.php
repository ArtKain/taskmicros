<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="/styles/massege.css">
    @yield('custom_css')
    
</head>
<body>
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <header class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <span class="fs-4">SR</span>
                </a>

                <nav class="d-inline-flex mt-2 mt-md-2 ms-md-4">
                    <a class="me-3 py-2 text-dark text-decoration-none" href="{{route('create')}}">Заполнение данных</a>
                    <a class="me-3 py-2 text-dark text-decoration-none" href="{{route('index')}}">Посмотреть Доходы/Расходы</a>
                    <a class="me-3 py-2 text-dark text-decoration-none" href="{{route('create.type')}}">Добавить тип</a>
                </nav>
            </header>
                @include('inc.massege')
                @yield('content')
        </div>
    </div>

</body>
</html>