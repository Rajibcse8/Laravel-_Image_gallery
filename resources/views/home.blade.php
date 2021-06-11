@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="show"></div>
                <div id="errMsg"></div>

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('album.store') }}" method="POST" enctype="multipart/form-data" id="form">
                            @csrf
                            <div class="form-group">
                                <label for="">Name of album</label>
                                <input type="text" name="album" class="form-control" id="album">
                            </div>

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
                            <br>

                            <div class="form-group">
                                <button class="btn btn-success">Sumbit</button>
                            </div>
                        </form>
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

            var html = $(".copy").html();
            $(".initial-add-more").after(html);

        });



        $("body").on("click", ".btn-remove", function() {

            $(this).parents(".control-group").remove();
        });

    });

</script>

<script type="text/javascript">
    $(document).ready(function() {

        $("#form").on('submit', (function(e) {
            e.preventDefault();
        
        //   Jquery  validation
        //     var alb=$('#album').val();
        //    if(alb==""){
        //        alert("error");
        //    }
           
        
            $.ajax({
                url: "/album",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,

                success: function(response) {

                    $('.show').html(response);
                    $("#form")[0].reset();
                    $("#errMsg").empty()

                },
                error: function(data) {
                	    	//console.log(data.responseJSON)
	    	var error = data.responseJSON;
	    	$("#errMsg").empty()
	    	$.each(error.errors,function(key,value){
	    		$("#errMsg").append('<p class="text-center text-danger">'+value+'</p>');

	    	});

                }

            });

        }));
    });

</script>
