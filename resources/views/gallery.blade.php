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
                        <form action="{{ route('image.delete')}}" method="POST">@csrf
                             <input type="hidden" name="id" value="{{ $album->id }}">
                           <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
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
