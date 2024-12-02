<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #cecece;
        }
    </style>
</head>
<body>

<section class="vh-100 gradient-custom">
  @include('sweetalert::alert')
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Login Admin</h2>
              <p class="text-white-50 mb-5"></p>

              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

              <form method="POST" action="{{route('login')}}">
                @csrf
                <div class="form-outline form-white mb-4">
                  <input type="email" placeholder="Email" name="email" id="typeEmailX" class="form-control form-control-lg" required />
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="password" placeholder="password" name="password" id="typePasswordX" class="form-control form-control-lg" required />
                </div>

                <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
              </form>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>
