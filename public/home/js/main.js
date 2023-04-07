//Send comment video
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$("#send-comment").click(function() {
  let content = $('#comment').val();
  if(!content) return;
  $("#send-comment").prop('disabled', true);
  let url = $(this).data("url");
  $.ajax({
        method: "POST",
        url: url,
        data: {
          comment: content
        }
    })
    .done(function(response) {
        $("#send-comment").prop('disabled', false);
        $("#box-comment").append(`<div class="direct-chat-msg right">
            <img class="direct-chat-img" src="/home/images/icon-user.png" alt="message user image">
            <div class="direct-chat-text">
            ${content}
            </div>
          </div>`);
        $('#comment').val('');
    })
    .fail(function(error) {
        $("#send-comment").prop('disabled', false);
        console.log(error);
    });

});  
$("#video-lesson").bind("ended", function() {
  let url = $(this).data("url");
  $.ajax({
        method: "POST",
        url: url,
    })
    .done(function(response) {
    })
    .fail(function(error) {
        console.log(error);
    });
});
function addToCart(url) {
  $.ajax({
        method: "POST",
        url: url,
    })
    .done(function(response) {
      alert('Đã thêm vào giỏ hàng.');
    })
    .fail(function(error) {
        console.log(error);
        alert('Đã có lỗi xảy ra, thử lại!');
    });
}

function removeToCart(url) {
  $.ajax({
        method: "POST",
        url: url,
    })
    .done(function(response) {
      location.reload();
    })
    .fail(function(error) {
        console.log(error);
        alert('Đã có lỗi xảy ra, thử lại!');
    });
}

function buyNow(url) {
  $.ajax({
        method: "POST",
        url: url,
    })
    .done(function(response) {
      location.href = "/checkout"
    })
    .fail(function(error) {
        console.log(error);
        alert('Đã có lỗi xảy ra, thử lại!');
    });
}