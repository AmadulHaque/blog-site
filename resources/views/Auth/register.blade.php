<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css"
    rel="stylesheet"
    />
    <title>Hello, world!</title>
  </head>
  <body style="background: #c0c0c0" >
  
    <br>
    <br>
    <br>


    <div class="container pt-5">
        <div class="row">
            <div class="col-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center p-3">{{ __('Register') }}</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route('registerPost')}}" method="post" >
                            @csrf
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
                            @error('name')
                                <span>{{ $message }}</span>
                            @enderror
                            <br>

                            <label for="email">Email:</label>
                            <input type="email"class="form-control"  name="email" id="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span>{{ $message }}</span>
                            @enderror
                            <br>

                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                            @error('password')
                                <span>{{ $message }}</span>
                            @enderror
                            <br>
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  
  </body>
</html>
