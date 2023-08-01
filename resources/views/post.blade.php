@foreach($posts as $item)
<div class="card">
  <div class="card-body">
    <h5 class="card-title">{{$item->user['name']}}</h5>
    <p class="card-text">{{$item->content}}</p>
    
    <div class="accordion" id="accordionExample">

      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$item->id}}" aria-expanded="true" aria-controls="collapseOne{{$item->id}}">Comment</button>
        </h2>
        <div id="collapseOne{{$item->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">

            <form class="formPost" method="post" >
                @csrf
                <input type="hidden" name="post_id" value="{{ $item->id }}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="input-group mb-3">
                  <div class="form-floating" style="width: 83%;">
                    <input name="content" type="text" class="form-control" id="floatingInputGroup1" placeholder="Comment">
                    <label for="floatingInputGroup1">Comments</label>
                  </div>
                  <span class="input-group-text"><button type="submit" style="float:right" class="btn btn-primary btn-block">Submit</button></span>
                </div>
            </form>

            <br>
            <ul class="list-group ">
              @foreach ($item->comments as $comment)
              @if ($comment->parent_id  > 0 )
              @else
                <li style="margin-bottom: 25px;" class="list-group-item d-flex justify-content-between ">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">{{ $comment->user['name'] }}</div>
                    {{ $comment->content }}
                  </div>
                  <span class="btn btn-primary">
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample{{$comment->id}}" aria-expanded="false" aria-controls="collapseExample{{$comment->id}}">Reply</button>
                  </span>
                </li>
                <ul class="mt-2" >

                  @foreach ($comment->children as $data)
                    <li style="margin-bottom: 25px;" class="list-group-item d-flex justify-content-between ">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold">{{ $data->user['name'] }}</div>
                        {{ $data->content }}
                      </div>
                      <span class="btn btn-primary">
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample{{$comment->id}}" aria-expanded="false" aria-controls="collapseExample{{$comment->id}}">Reply</button>
                      </span>
                    </li>
                  @endforeach
                  
                </ul>
                <div class="collapse" id="collapseExample{{$comment->id}}">
                  <div class="card card-body">
                    <form class="formPost" method="post" >
                      @csrf
                      <input type="hidden" name="post_id" value="{{ $item->id }}">
                      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                      <input type="hidden" name="parent_id" value="{{$comment->id }}">
                      <div class="input-group mb-3">
                        <div class="form-floating" style="width: 80%;">
                          <input  name="content" type="text" class="form-control" id="floatingInputGroup1" placeholder="Username">
                          <label for="floatingInputGroup1">Reply</label>
                        </div>
                        <span class="input-group-text"><button type="submit" style="float:right" class="btn btn-primary btn-block">Submit</button></span>
                      </div>
                  </form>
                  </div>
                </div>
                <br>
                @endif
              @endforeach
            </ul>
          </div>
        </div>
      </div>

  

    </div>



  </div>
</div>
<br>
@endforeach