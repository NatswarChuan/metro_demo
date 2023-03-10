<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.3.0/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="antialiased">
    <div class="container-fluid">
        {{-- <div class="route-wrapper card mt-5">
            <div class="route-name rounded-pill d-inline-block">TUYẾN SỐ 1</div>
            <div class="route card-body">
                <div class="row">
                    <input type="radio" name="route-1" class="col station-dot" id="sta-1" checked
                        data-bs-toggle="tooltip" data-bs-custom-class="route-tooltip" data-bs-html="true"
                        data-bs-title="Tuyến <span class='badge text-bg-light'>1</span>">
                    <input type="radio" name="route-1" class="col station-dot" id="sta-2" data-bs-toggle="tooltip"
                        data-bs-custom-class="route-tooltip" data-bs-html="true"
                        data-bs-title="Tuyến <span class='badge text-bg-light'>1</span>">
                    <input type="radio" name="route-1" class="col station-dot" id="sta-3" data-bs-toggle="tooltip"
                        data-bs-custom-class="route-tooltip" data-bs-html="true"
                        data-bs-title="Tuyến <span class='badge text-bg-light'>1</span>">
                    <input type="radio" name="route-1" class="col station-dot" id="sta-4" data-bs-toggle="tooltip"
                        data-bs-custom-class="route-tooltip" data-bs-html="true"
                        data-bs-title="Tuyến <span class='badge text-bg-light'>1</span>">
                    <input type="radio" name="route-1" class="col station-dot" id="sta-5" data-bs-toggle="tooltip"
                        data-bs-custom-class="route-tooltip" data-bs-html="true"
                        data-bs-title="Tuyến <span class='badge text-bg-light'>1</span> <span class='badge text-bg-light'>5</span>">
                    <input type="radio" name="route-1" class="col station-dot" id="sta-6" data-bs-toggle="tooltip"
                        data-bs-custom-class="route-tooltip" data-bs-html="true"
                        data-bs-title="Tuyến <span class='badge text-bg-light'>1</span>">
                    <input type="radio" name="route-1" class="col station-dot" id="sta-7" data-bs-toggle="tooltip"
                        data-bs-custom-class="route-tooltip" data-bs-html="true"
                        data-bs-title="Tuyến <span class='badge text-bg-light'>1</span>">
                    <input type="radio" name="route-1" class="col station-dot" id="sta-8" data-bs-toggle="tooltip"
                        data-bs-custom-class="route-tooltip" data-bs-html="true"
                        data-bs-title="Tuyến <span class='badge text-bg-light'>1</span>">
                    <input type="radio" name="route-1" class="col station-dot" id="sta-9" data-bs-toggle="tooltip"
                        data-bs-custom-class="route-tooltip" data-bs-html="true"
                        data-bs-title="Tuyến <span class='badge text-bg-light'>1</span>">
                    <input type="radio" name="route-1" class="col station-dot" id="sta-10" data-bs-toggle="tooltip"
                        data-bs-custom-class="route-tooltip" data-bs-html="true"
                        data-bs-title="Tuyến <span class='badge text-bg-light'>1</span>">
                    <input type="radio" name="route-1" class="col station-dot" id="sta-11"
                        data-bs-toggle="tooltip" data-bs-custom-class="route-tooltip" data-bs-html="true"
                        data-bs-title="Tuyến <span class='badge text-bg-light'>1</span>">
                    <input type="radio" name="route-1" class="col station-dot" id="sta-12"
                        data-bs-toggle="tooltip" data-bs-custom-class="route-tooltip" data-bs-html="true"
                        data-bs-title="Tuyến <span class='badge text-bg-light'>1</span>">
                    <input type="radio" name="route-1" class="col station-dot" id="sta-13"
                        data-bs-toggle="tooltip" data-bs-custom-class="route-tooltip" data-bs-html="true"
                        data-bs-title="Tuyến <span class='badge text-bg-light'>1</span>">
                    <input type="radio" name="route-1" class="col station-dot" id="sta-14"
                        data-bs-toggle="tooltip" data-bs-custom-class="route-tooltip" data-bs-html="true"
                        data-bs-title="Tuyến <span class='badge text-bg-light'>1</span>">

                </div>
                <div class="row">
                    <div class="col station-name">
                        <label for="sta-1">Bến Thành</label>
                    </div>
                    <div class="col station-name">
                        <label for="sta-2">Nhà hát TP</label>
                    </div>
                    <div class="col station-name">
                        <label for="sta-3">Ba Son</label>
                    </div>
                    <div class="col station-name">
                        <label for="sta-4">Văn Thánh</label>
                    </div>
                    <div class="col station-name">
                        <label for="sta-5">Tân Cảng</label>
                    </div>
                    <div class="col station-name">
                        <label for="sta-6">Thảo Điền</label>
                    </div>
                    <div class="col station-name">
                        <label for="sta-7">An Phú</label>
                    </div>
                    <div class="col station-name">
                        <label for="sta-8">Rạch Chiếc</label>
                    </div>
                    <div class="col station-name">
                        <label for="sta-9">Phước Long</label>
                    </div>
                    <div class="col station-name">
                        <label for="sta-10">Bình Thái</label>
                    </div>
                    <div class="col station-name">
                        <label for="sta-11">Thủ Đức</label>
                    </div>
                    <div class="col station-name">
                        <label for="sta-12">Khu Công nghệ cao</label>
                    </div>
                    <div class="col station-name">
                        <label for="sta-13">Suối Tiên</label>
                    </div>
                    <div class="col station-name">
                        <label for="sta-14">BXMĐ mới</label>
                    </div>

                </div>
            </div>
            <div class="card-footer text-center">
                <span class="badge rounded-pill text-bg-secondary"><i class="fa-solid fa-clock"></i> 5:00 -
                    21:00</span>

                <span class="badge rounded-pill text-bg-secondary"><i
                        class="fa-solid fa-arrows-left-right-to-line"></i>
                    28km</span>

            </div>
        </div> --}}
        <div class="route-wrapper card mt-5">
            <div class="route-name rounded-pill d-inline-block">TUYẾN SỐ 1</div>
        </div>
        <div class="route-wrapper card mt-5">
            <div class="route-name rounded-pill d-inline-block">TUYẾN SỐ 1</div>
        </div>
        <div class="route-wrapper card mt-5">
            <div class="route-name rounded-pill d-inline-block">TUYẾN SỐ 1</div>
        </div>
    </div>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response = this.responseText;

                console.log(JSON.parse(response));
                // Xử lý kết quả trả về từ server
            }
        };

        xhttp.open("GET", "http://127.0.0.1:8000/api/routes", true);
        xhttp.send();
    </script>
</body>

</html>
