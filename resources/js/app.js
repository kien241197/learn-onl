
import './bootstrap';
import './jquery.nestable.min';

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

$('.dd').nestable({ 
    scroll: true,
    maxDepth: 2,
    beforeDragStop: function(l,e, p){
        var type = $(e).data('type');
        var type2 = $(p).data('type');

        if(type == 'chapter')
        {
            if(type2 != 'chapter')
                return false;
            else
                return true;
        }
        else if(type == 'lesson')
        {
            if(type2 == 'lesson')
                return true;
            else
                return false;
        }
    } 
});
