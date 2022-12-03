$(function(){
    "use strict";

    $('form').submit(function(){
        $(".btn-submit").attr("disabled", true);
        $(".btn-submit").html("<span class='spinner-grow spinner-grow-sm' role='status' aria-hidden='true'></span>");
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#profile_photo").change(function(e){
        e.preventDefault();
        var file = $(this).get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $(".profile-image-inner-container img").attr("src", reader.result);
                $("#profPhoto").val(reader.result);
            }
            reader.readAsDataURL(file);
        }
        $(this).val('');
    });
})