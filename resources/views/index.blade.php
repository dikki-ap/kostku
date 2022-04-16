<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    {{-- Favicon --}}
    <link rel="shortcut icon" href="/img/logo.png" type="image/png">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet" />

    <style>
        * {
            font-family: "Poppins", sans-serif;
            font-weight: 400;
        }
    </style>

    <title>KostKu | {{ $title }}</title>
  </head>
  <body>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#15adcc" fill-opacity="1" d="M0,64L21.8,106.7C43.6,149,87,235,131,261.3C174.5,288,218,256,262,208C305.5,160,349,96,393,80C436.4,64,480,96,524,96C567.3,96,611,64,655,48C698.2,32,742,32,785,74.7C829.1,117,873,203,916,202.7C960,203,1004,117,1047,85.3C1090.9,53,1135,75,1178,90.7C1221.8,107,1265,117,1309,122.7C1352.7,128,1396,128,1418,128L1440,128L1440,0L1418.2,0C1396.4,0,1353,0,1309,0C1265.5,0,1222,0,1178,0C1134.5,0,1091,0,1047,0C1003.6,0,960,0,916,0C872.7,0,829,0,785,0C741.8,0,698,0,655,0C610.9,0,567,0,524,0C480,0,436,0,393,0C349.1,0,305,0,262,0C218.2,0,175,0,131,0C87.3,0,44,0,22,0L0,0Z"></path></svg>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card rounded-3 shadow p-3">
                    <img src="/img/logo.png" class="img-fluid mx-auto d-block" width="100" alt="KostKu Logo">
                    <div class="card-body">
                      <h3 class="card-title text-center mb-5" style="color: #15adcc">{{ $title }}</h3>

                      @auth
                        {{-- Jika sudah Login, tampilkan ke Dashboard --}}
                        <a href="/dashboard" class="w-100 btn btn-lg btn-primary border-0 mt-3" style="background-color: #15adcc"><span data-feather="monitor"></span>&nbsp; Dashboard</a>
                        <form action="/logout" method="POST">
                          @csrf
                          <button type="submit" class="w-100 btn btn-lg btn-primary rounded border-0 mt-3" style="background-color: #DC3545"><span data-feather="log-out"></span>&nbsp; Logout</button>
                      </form>
                      @else
                        {{-- Jika belum login, tampilkan untuk Login dan Register --}}
                        <a href="/login" class="w-100 btn btn-lg btn-primary border-0 mt-3" style="background-color: #15adcc"><span data-feather="log-in"></span>&nbsp; Login</a>
                        <a href="/register" class="w-100 btn btn-lg btn-primary border-0 mt-3" style="background-color: #15adcc"><span data-feather="user-plus"></span>&nbsp; Register</a>
                      @endauth

                    </div>
                </div>
            </div>
        </div>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#15adcc" fill-opacity="1" d="M0,96L21.8,85.3C43.6,75,87,53,131,85.3C174.5,117,218,203,262,208C305.5,213,349,139,393,133.3C436.4,128,480,192,524,208C567.3,224,611,192,655,192C698.2,192,742,224,785,240C829.1,256,873,256,916,256C960,256,1004,256,1047,234.7C1090.9,213,1135,171,1178,165.3C1221.8,160,1265,192,1309,170.7C1352.7,149,1396,75,1418,37.3L1440,0L1440,320L1418.2,320C1396.4,320,1353,320,1309,320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,320,305,320,262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z"></path></svg>

    {{-- Bootstrap JS --}}
    <script src="/js/bootstrap.bundle.min.js"></script>

    {{-- Feather Icons --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        feather.replace()
    </script>
  </body>
</html>