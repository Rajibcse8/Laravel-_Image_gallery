@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="input-group control-group initial-add-more">
                    <input type="file" name="image[]" class="form-control" id="image">
                    <div class="input-group-btn">
                        <button class="btn btn-success btn-add-more" type="button">Add</button>
                    </div>
                </div>
                <div class="copy" style="display: none;">
                    <div class="input-group control-group add-more" style="margin-top:12px;">
                        <input type="file" name="image[]" class="form-control" id="image">
                        <div class="input-group-btn">
                            <button class="btn btn-danger btn-remove" type="button">Remove</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    {{-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> --}}

    {{-- <div class="container">
    <div class="row justify-content-center">
        <form action="{{ route('album.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="album" class="form-control" placeholder="Enter your album name">
            <input type="file" name="image[]" class="form-control">
            <input type="file" name="image[]" class="form-control">
            <input type="file" name="image[]" class="form-control">
            <button class="btn btn-primary" types="submit">Submit</button>

        </form>
    
    </div>
    @foreach ($images as $image)
    <img srcset="{{ asset('storage/'.$image->name) }}"  class="img-thumbnail`">
       
   @endforeach
</div> --}}

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(document).ready(function(e) {

        $(".btn-add-more").click(function(e) {
           
            var html= $(".copy").html();
            $(".initial-add-more").after(html);
          
        });

         $(".body").on("click",".btn-remove",function(){
           
           $(this).parents(".control-group").remove();
         })

    });

</script>
