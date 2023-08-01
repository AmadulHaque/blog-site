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
    <!-- MDB -->

    <title>Blog | Post</title>
  </head>
  <body class="body" style="background: #c0c0c0" >
    <script src="{{ asset('js/Toast.js') }}"></script>
    <br>
 
    <div class="container ">
        <div class="row">
            <div class="col-8 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center p-3">{{ __('Post') }}</h2>
                    </div>
                    <div class="card-body">
                        <form id="form" method="post" >
                            @csrf
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                               <textarea  placeholder="Post content.."  name="content"   class="form-control" style="border: 1px solid #4444;" ></textarea>
                            </div>
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block">Post Submit</button>
                        </form>
                    </div>
                </div>
                <br>
                <div class="AllPost">
                  <div class="m-auto d-block spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                </div>
              
                

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function() {
        loadPost();
        function loadPost(){
          $('.AllPost').html(" ");
          $.ajax({
              type:'get',
              url: '/post',
              contentType:false,
              processData:false,
              success: function(res){
                  $('.AllPost').html(res);
              },
              error:function (response){
                  console.log(response);
              }
          });
        }
             
        $(document).on('submit','#form',function(e){
            e.preventDefault()
            let formData = new FormData($(this)[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                type:'post',
                url: '/post',
                data:formData,
                contentType:false,
                processData:false,
                success: function(res){
                    if (res.success==false) {
                        $.each(res.errors, function(key, item){
                            ToastMessage("error",item,3000,'top-center');
                        })
                    }else{
                        ToastMessage("success"," Post Success!",3000,'top-center');
                        $('#form')[0].reset();
                        loadPost();
                    }
                },
                error:function (response){
                    console.log(response);
                }
            });
        })

        $(document).on('submit','.formPost',function(e){
            e.preventDefault()
            let formData = new FormData($(this)[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                type:'post',
                url: '/Commentpost',
                data:formData,
                contentType:false,
                processData:false,
                success: function(res){
                    if (res.success==false) {
                        $.each(res.errors, function(key, item){
                            ToastMessage("error",item,3000,'top-center');
                        })
                    }else{
                        ToastMessage("success","Success!",3000,'top-center');
                        loadPost();
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
