<!doctype html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark text-white">
<div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 bg-dark border-bottom">
    <a href="/" class="d-flex align-items-center text-white text-decoration-none">
        <span class="fs-4 ms-4">Автовоз_UA</span>
    </a>
    <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
        <a class="me-3 py-2 text-white text-decoration-none" href="/">Головна</a>
        <span class="me-3 py-2 text-white text-decoration-none">|</span>
        <a class="me-3 py-2 text-white text-decoration-none" href="/createOrder">Замовити перевезення</a>
        <span class="me-3 py-2 text-white text-decoration-none">|</span>
        <a class="me-3 py-2 text-white text-decoration-none" href="/orderStatus">Статус замовлення</a>
        <span class="me-3 py-2 text-white text-decoration-none">|</span>
        <a class="me-3 py-2 text-white text-decoration-none" href="/price">Прайс</a>
        <span class="me-3 py-2 text-white text-decoration-none">|</span>
        <a class="me-3 py-2 text-white text-decoration-none" href="/input">База даних</a>
    </nav>
</div>
<div class="ms-3">
    Звязатись з нами:
    <div class="ms-5">
        <span>+380685342868</span>
    </div>
    <div class="ms-5">
        <span>+380507319268</span>
    </div>
</div>
<div class="container">
    @yield('main_content')
</div>
</body>
</html>
