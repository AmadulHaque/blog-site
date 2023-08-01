<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('js/Toast.css') }}">
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

  

    <title>Blog | Post</title>
    </head>
    <body class="body">
  
    <script src="{{ asset('js/Toast.js') }}"></script>
    <br>


    <div class="container pt-5">
        <div class="row">
            <div class="col-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center p-3">{{ __('Register') }}</h2>
                    </div>
                    <div class="card-body">
                        <form id="form" method="post" >
                            @csrf
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" >
                            @error('name')
                                <span>{{ $message }}</span>
                            @enderror
                            <br>

                            <label for="email">Email:</label>
                            <input type="email"class="form-control"  name="email" id="email" value="{{ old('email') }}" >
                            @error('email')
                                <span>{{ $message }}</span>
                            @enderror
                            <br>

                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" id="password" >
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
      <script>

    $(document).ready(function() {
        

        $(document).on('submit','#form',function(e){
            e.preventDefault()
            let formData = new FormData($(this)[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                type:'post',
                url: '/registerPost',
                data:formData,
                contentType:false,
                processData:false,
                success: function(res){

                    console.log(res);
                    if (res.success==false) {
                        $.each(res.errors, function(key, item){
                            ToastMessage("error",item,3000,'top-center');
                        })
                    }else{
                        ToastMessage("success"," Register Success!",3000,'top-center');
                        $('#form')[0].reset();
                          location.href = '/login';
                    }
                },
                error:function (response){
                    console.log(response);
                }
            });
        })
    

    
      
    });
    </script>
  </body>
</html>
