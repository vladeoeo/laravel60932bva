<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <title>609-32</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.js">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>   .is-invalid {color: red;}   </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Laravel Project</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" aria-current="page" data-bs-toggle="dropdown"
                            href="{{url('good')}}">Товары</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('good')}}">Все товары</a></li>
                            <li><a class="dropdown-item" href="{{url('good/create')}}">Добавить товар</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('order')}}">Заказы</a>
                    </li>
                </ul>
                @if(!Auth::user())
                    <form class="d-flex" method="post" action="{{url('auth')}}">
                        @csrf
                        <input class="form-control me-2" type="text" placeholder="Логин" aria-label="Логин" name="email" value="{{old('email')}}">
                        <input class="form-control me-2" type="password" placeholder="Пароль" aria-label="Пароль" name="password" value="{{old('password')}}">
                        <button class="btn btn-outline-succes" type="submit">Войти</button>
                    </form>
                @else
                    <ul class="nav_wrapper">
                        <a class="nav_wrapper-btn" href="#"><i class="fa fa-user" style="font-size:20px;color:white;"></i>
                            <span>  </span>{{Auth::user()->first_name}}
                        </a>
                        <a class="nav_wrapper-btn" href="{{url('logout')}}">Выйти</a>
                    </ul>
                @endif
            </div>
        </div>
    </nav>
</header>
</body>
</html>



