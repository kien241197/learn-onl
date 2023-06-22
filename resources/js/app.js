
import './bootstrap';
import './adminlte.min';

function updateURLParameter(url, param, paramVal)
{
    var TheAnchor = null;
    var newAdditionalURL = "";
    var tempArray = url.split("?");
    var baseURL = tempArray[0];
    var additionalURL = tempArray[1];
    var temp = "";

    if (additionalURL) 
    {
        var tmpAnchor = additionalURL.split("#");
        var TheParams = tmpAnchor[0];
            TheAnchor = tmpAnchor[1];
        if(TheAnchor)
            additionalURL = TheParams;

        tempArray = additionalURL.split("&");

        for (var i=0; i<tempArray.length; i++)
        {
            if(tempArray[i].split('=')[0] != param)
            {
                newAdditionalURL += temp + tempArray[i];
                temp = "&";
            }
        }        
    }
    else
    {
        var tmpAnchor = baseURL.split("#");
        var TheParams = tmpAnchor[0];
            TheAnchor  = tmpAnchor[1];

        if(TheParams)
            baseURL = TheParams;
    }

    if(TheAnchor)
        paramVal += "#" + TheAnchor;

    var rows_txt = temp + "" + param + "=" + paramVal;
    return baseURL + "?" + newAdditionalURL + rows_txt;
}
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(".btn-delete-record").click(function() {
    let url = $(this).data("url");
    Swal.fire({
        title: "Xác nhận xóa dữ liệu này?",
        icon: "warning",
        text: "Dữ liệu sẽ không thể hoàn tác",
        confirmButtonText: "Xóa",
        cancelButtonText: "Hủy",
        showCancelButton: true
    }).then(result => {
        if (result.value) {
            $('.loading-div').removeClass('hidden');
            $.ajax({
                    method: "DELETE",
                    url: url,
                })
                .done(function(response) {
                    $('.loading-div').addClass('hidden');
                    Swal.fire({
                            title: response,
                            icon: "success",
                            confirmButtonText: "OK"
                        })
                        .then(function() {
                            window.location.reload();
                        });
                })
                .fail(function(error) {
                    $('.loading-div').addClass('hidden');
                    console.log(error);
                });
        }
    });
});
$(".btn-reset-limit").click(function() {
    let url = $(this).data("url");
    Swal.fire({
        title: "Reset giới hạn thiết bị tài khoản này?",
        icon: "warning",
        text: "Dữ liệu sẽ không thể hoàn tác",
        confirmButtonText: "Xác nhận",
        cancelButtonText: "Hủy",
        showCancelButton: true
    }).then(result => {
        if (result.value) {
            $('.loading-div').removeClass('hidden');
            $.ajax({
                    method: "POST",
                    url: url,
                })
                .done(function(response) {
                    $('.loading-div').addClass('hidden');
                    Swal.fire({
                            title: response,
                            icon: "success",
                            confirmButtonText: "OK"
                        })
                        .then(function() {
                            // window.location.reload();
                        });
                })
                .fail(function(error) {
                    $('.loading-div').addClass('hidden');
                    console.log(error);
                });
        }
    });
});
$("#size-limit").change(function() {
    var newURL = updateURLParameter(window.location.href, 'limit', $(this).val());
    location.href = newURL;
});

$(document).ready(function() {
    // Select2 Multiple
    $('.select2-multiple').select2({
        placeholder: "Select",
        allowClear: true
    });

});

$('.datetimepicker-input').datetimepicker({
    format:'Y-m-d H:m:s',
});

const inputFile = document.getElementById("video");
const inputLesson = document.getElementById("lesson-video");
const video = document.getElementById("video_show");
if(inputFile){
    inputFile.addEventListener("change", function(){
        if($(this).val()) $('#lesson-video').val('').trigger('change');
        const file = inputFile.files[0];
        var videourl = '';
        if(file){
            videourl = URL.createObjectURL(file);        
        }
        video.setAttribute("src", videourl);
    });    
}
// if(inputLesson){
//     inputLesson.addEventListener("change", function(){
//         if($(this).val()) inputFile.value = '';
//         const file = inputLesson.value;
//         var videourl = '';
//         // if(file){
//         //     videourl = '/' + file;        
//         // }
//         video.setAttribute("src", file);
//     });    
// }

var input = document.getElementById( 'document' );
var infoArea = document.getElementById( 'file-upload-filename' );

if(input){
    input.addEventListener( 'change', showFileName );

    function showFileName( event ) {
      $("#file-upload-filename").empty();
      // the change event gives us the input it occurred in 
      var input = event.srcElement;
      
      // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
      var fileName = '';
      if(input.files[0]){
          fileName = input.files[0].name;
      }
      // use fileName however fits your app best, i.e. add it into a div
      if(fileName) {
        var e = document.createElement('div');
        var xmlString = '<i class="fa fa-file"></i> ' + fileName + ' <a href="javascript:void(0)" class="pl-1 pr-1 remove-file"><b>X</b></a>'; 
        e.innerHTML = xmlString;
        infoArea.appendChild(e);   
      }
      $(".remove-file").click(function() {
        $("#file-upload-filename").empty();
        $("#document").val("");
        $("#old_document").val("");
      });
    }    
}

$(".remove-file").click(function() {
    $("#file-upload-filename").empty();
    $("#old_document").val("");
});

$(document).ready(function() {
    $('#table-order').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
        ]
    } );
    if (document.getElementsByName('detail_course').length > 0) {
        CKEDITOR.replace('detail_course', {
            width :1000,
            height: 700
        });
    }
    if (document.getElementsByName('content_dieu_khoan').length > 0) {
        CKEDITOR.replace('content_dieu_khoan', {
            width :1000,
            height: 700
        });
    }
    if (document.getElementsByName('content_chinh_sach').length > 0) {
        CKEDITOR.replace('content_chinh_sach', {
            width :1000,
            height: 700
        });
    }
    $('#lesson-video').select2();
    $('#lesson-video').on('select2:select', function (e) {
        var data = e.params.data;
        if(data.id) $("#video").val('');
        $("#video_show").attr("src", data.id);
    });
} );