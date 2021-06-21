@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            @foreach ($albums as $album)
                <a href="albums/{{ $album->id }}">
                    <div class="col-sm-4">

                        <div class="item">
                            <img src="{{ asset('image/nature1.jpg') }}" class="img-thumbnail" alt="">
                            <a href="albums/{{ $album->id }}" class="centered">Nature</a>
                        </div>


                    </div>
                </a>
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
