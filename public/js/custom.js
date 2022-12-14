$(function(){
    "use strict";

    disablePastDaysInCalendar();

    $("#log").click(function(){
        var dis = $(this);
        if(dis.is(":checked")){
            dis.parent().parent().find('#pin').prop('required', true);
        }else{
            dis.parent().parent().find('#pin').prop('required', false);
        }
    });

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
    });

    $('#dataTbl').DataTable();

    $(".slot").click(function(){
        var dis = $(this);
        $('.slot').removeClass('activeslot');
        dis.addClass('activeslot');
        dis.parent('div').find(".atime").val(dis.text().trim());
    });

    $(".slotBtn").click(function(){
        var id = $(this).data('bs-target');
        $(".collapse").removeClass('show');
        $("#"+id).addClass('show');
    });

    $(".no-app").addClass('no-app');

});

setTimeout(function () {
    $(".alert").hide('slow');
}, 3000);

function disablePastDaysInCalendar(){
    var dtToday = new Date();
 
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
     day = '0' + day.toString();
    var maxDate = year + '-' + month + '-' + day;
    $('.inputdate').attr('min', maxDate);
}