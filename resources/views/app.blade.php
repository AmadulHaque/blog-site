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


    <div class="container ">
        <div class="row">
            <div class="col-8 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center p-3">{{ __('Post') }}</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route('Post')}}" method="post" >
                            @csrf
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                               <textarea name="content"  required class="form-control" style="border: 1px solid #4444;" ></textarea>
                            </div>
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block">Post Submit</button>
                        </form>
                    </div>
                </div>
                <hr>
                <br>
                @foreach($posts as $item)
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">{{$item->user['name']}}</h5>
                    <p class="card-text">{{$item->content}}</p>
                
        

                    <p class="d-inline-flex gap-1">
                      <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample{{$item->id}}" role="button" aria-expanded="false" aria-controls="collapseExample{{$item->id}}">
                       comments
                      </a>

                    </p>
                    <div class="collapse" id="collapseExample{{$item->id}}">

                        <form action="{{route('Post')}}" method="post" >
                            @csrf
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                               <textarea name="comment"  required class="form-control" style="border: 1px solid #4444;" ></textarea>
                            </div>
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block">comment</button>
                        </form>

                      <div class="card card-body">
                        Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                      </div>
                    </div>

                  </div>
                </div>
                <br>
                @endforeach

            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  
  </body>
</html>
