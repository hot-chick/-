<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <style>
        .hero {
            height: 75vh;
            width: 100%;
            overflow: hidden;
            background-image: url('storage/image/msg-1838079764-2753.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 50% 20%;

        }
    </style>
</head>

<body>
    <div class="header">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Курсу.су</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#about">О нас</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#courses">Курсы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#enroll">Записаться</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/signin">Войти</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <main>
        <section id="hero" class="hero d-flex justify-content-center align-items-center text-white ">
            <h1 class="bg-dark p-1 opacity-75">Онлайн курсы - это круто!</h1>
        </section>
        <section id="about">
            <div class="container">
                <h2 class="m-3">О нас</h2>
                <div class="row mb-3">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Преимущества 1</h5>
                                <p class="card-text">описание преимущества</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Преимущества 2</h5>
                                <p class="card-text">описание преимущества</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Преимущества 3</h5>
                                <p class="card-text">описание преимущества</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Преимущества 4</h5>
                                <p class="card-text">описание преимущества</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- <section id="courses">
            <div class="container">
                <h2 class="m-3">Наши курсы</h2>
                <div class="d-flex">
                    @foreach ($courses as $item)
                        <div class="card" style="width: 18rem;">
                            <img src="storage/image/{{ $item->image }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <p class="card-text">{{ $item->description }}</p>
                                <p class="card-text">{{ $item->cost }}</p>
                                <p class="card-text">{{ $item->duration }}</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </section> --}}

        <section id="courses">
            <div class="container py-4">
                <h2 class="m-3">Наши Курсы</h2>
                <div class="d-flex">
                    @forelse($courses as $item)
                        <div class="card" style="width: 18rem;">
                            <img src="storage/image/{{ $item->image }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <p class="card-text">{{ $item->description }}</p>
                                <p class="card-text">Продолжительность курса
                                    <b>{{ $item->duration }}</b>
                                </p>
                                <p class="card-text">Стоимость
                                    <b>{{ $item->cost }}</b>
                                </p>
                            </div>
                        </div>
                    @empty
                        <p>нету курсов больше</p>
                    @endforelse
                </div>
                {{ $courses->withQueryString()->links('pagination::bootstrap-5') }}
            </div>
        </section>
        {{ session()->get('alert') }}

        <section id="enroll">
            <div class="container">
                <h2 class="m-3">Запись на курс</h2>
                <form method="POST" action="/enroll">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Ваш email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Ваше имя</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Выберите курс</label>
                        <select class="form-select" name="course">
                            @foreach ($courses as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Оставить заявку</button>
                </form>
            </div>

        </section>
    </main>
</body>

</html>
