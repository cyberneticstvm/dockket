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

    $('#dataTbl, #dataTbl1').DataTable();
    $('#dataTblDoc, #dataTblClinic').DataTable({
        'columnDefs': [ {
            'targets': [5,6], // column index (start from 0)
            'orderable': false, // set orderable false for selected columns
         }]
    });

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

    $(".cstart").change(function(){
        var cstart = $(".cstart").val();
        var bstart = $(".bstart").val();
        var slots = $(".totslot").val();
        var dur = $(".dur").val();
        $.ajax({
            type: 'GET',
            url: '/getBreakTime/',
            data: {'cstart': cstart, 'bstart': bstart, 'slots': slots, 'dur': dur},
            success: function(response){
                //$(".bstart, .bend").html(data)
                var data = JSON.parse(response);
                $(".bstart").html(data.bs);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                console.log(XMLHttpRequest);
            }
        });
        return false;
    });
    $(".bstart").change(function(){
        var cstart = $(".cstart").val();
        var bstart = $(".bstart").val();
        var slots = $(".totslot").val();
        var dur = $(".dur").val();
        $.ajax({
            type: 'GET',
            url: '/getBreakTime/',
            data: {'cstart': cstart, 'bstart': bstart, 'slots': slots, 'dur': dur},
            success: function(response){
                //$(".bstart, .bend").html(data)
                var data = JSON.parse(response);
                $(".bend").html(data.be);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                console.log(XMLHttpRequest);
            }
        });
        return false;
    });

    $(".chkClinicStatus").click(function(){
        var rid = $(this).closest('tr').attr('id');
        var val = 'P';
        if($(this).is(":checked")){
            val = 'C';
        };
        $.ajax({
            type: 'GET',
            url: '/updateClinicRequestStatus/',
            data: {'rid': rid, 'val': val},
            success: function(response){
                alert(response);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                console.log(XMLHttpRequest);
            }
        });
    });

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

var options = {
    componentRestrictions: {country: "in"}
};
window.addEventListener('load', initialize);
function initialize() {
    var input = document.getElementById('address');
    var autocomplete = new google.maps.places.Autocomplete(input, options);
    autocomplete.addListener('place_changed', function () {
        var place = autocomplete.getPlace();
        $('#latitude').val(place.geometry['location'].lat());
        $('#longitude').val(place.geometry['location'].lng());
    });
}
