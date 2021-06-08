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



@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(document).ready(function(e) {

        $(".btn-add-more").click(function(e) {
           
            var html= $(".copy").html();
            $(".initial-add-more").after(html);
          
        });

     

         $("body").on("click",".btn-remove",function(){
           
           $(this).parents(".control-group").remove();
         });

    });

</script>
