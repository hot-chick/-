<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <title>Document</title>
</head>


<body>
    <section id="courses">
        <div class="container py-4">
            <h2 class="m-3">Наши Курсы</h2>
            <div class="d-flex">
                @foreach ($categories as $item)
                    <div class="card" style="width: 18rem;">
                        <img src="../../storage/image/{{ $item->image }}" class="card-img-top" alt="...">
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
                @endforeach
            </div>
        </div>
    </section>
</body>

</html>
