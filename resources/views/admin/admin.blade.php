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
        a>img {
            width: 25px
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Курсу.су</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li>
                            <a class="nav-link" href="/admin">Панель администрации</a>
                        </li>
                        <li>
                            <a class="nav-link" href="/">Выход</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section>
            <div class="container">
                <h2 class="m-3">Список заявок</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Имя клиента</th>
                            <th scope="col">Курс</th>
                            <th scope="col">Дата заявки</th>
                            <th scope="col">Статус</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_applications as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->course_id }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    @if ($item->is_confirm == 0)
                                        Не подтверждено
                                    @else
                                        Подтверждено
                                    @endif
                                </td>
                                <td>
                                    @if ($item->is_confirm == 0)
                                        <a href="/application/{{ $item->id }}/confirm">
                                            <img src="\storage\image\91d4ad0e-2338-4660-bca9-73e5e414b029.png" alt="Принять">
                                        </a>
                                </td>
                        @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
        <section>
            <div class="container">
                <h2 class="m-3">Создание курса</h2>
                <form method="POST" action="/course/create" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Название курса</label>
                        <input type="text" name="title" class="form-control" id="title">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Описание курса</label>
                        <textarea class="form-control" name="description" id="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="cost" class="form-label">Стоимость курса</label>
                        <input type= "number" name="cost" class="form-control" id="cost">
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label">Длительность курса (в неделях)</label>
                        <input type= "number" name="duration" class="form-control" id="duration">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Изображение курса</label>
                        <input type= "file" name="image" class="form-control" id="image">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Категория курса</label>
                        <select name="category_id" class="form-select" >

                        @foreach ($categories as $item)
                            <option value="{{$item->id}}">{{$item->title}}</option>
                        @endforeach

                    </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Создать курс</button>
                </form>
            </div>
        </section>
        <section>
            <div class="container">
                <h2 class="m-3">Создание категории</h2>
                <form method="POST" action="/category/create" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Название категории</label>
                        <input type="text" name="category_name" class="form-control" id="category_name">
                    </div>

                    <button type="submit" class="btn btn-primary">Создать категорию</button>
                </form>
            </div>
        </section>
    </main>

</body>

</html>
