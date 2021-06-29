@extends('layouts.app')
@section('content')

    <div class="container">
       @if(Session::has('messege'))

         <div class="alert alert-sucess">
             {{ Session::get('messege') }}
        </div>    
       @endif
       <h1>{{ $albums->name }}({{ $albums->images->count() }})</h1>
        <div class="row">
            @foreach ($albums->images as $album)
                
                    <div class="col-sm-4">

                        <div class="item">
                            <img src="{{ asset('storage/'.$album->name) }}" class="img-thumbnail" alt="" style="width:300px">
                           
                        </div>
                        {{-- <form action="{{ route('image.delete')}}" method="POST">@csrf
                             <input type="hidden" name="id" value="{{ $album->id }}">
                           <button type="submit" class="btn btn-danger">Delete</button>
                        </form> --}}

<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
    Delete
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         Are you sure to delete this Photo?
        </div>
        <div class="modal-footer">
            <form action="{{ route('image.delete')}}" method="POST">@csrf
                <input type="hidden" name="id" value="{{ $album->id }}">
              <button type="submit" class="btn btn-danger">Confirm</button>
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
           </form>
         
         
        </div>
      </div>
    </div>
  </div>
  <!--Modal end-->

                    </div>
            @endforeach
        </div>
    </div>

@endsection

<style>
    .item {
        left: 0;
        top: 0;
        position: relative;
        overflow: hidden;
        margin-top: 50%;

    }

    .item img {
        -webkit-transition: 0.6s ease;
        transition: 0.6s ease;
    }

    .item img:hover {
        -webkit-transform: scale(1.2);
        transform: scale(1.2);
    }

    .centered {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -0%);
        color: #fff;
        font-size: 24px;
    }

    .img-thumbnail {
        border: 0px;
        border-radius: 0px;
    }

</style>
