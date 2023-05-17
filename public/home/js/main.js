// cookie
function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {   
    document.cookie = name+'=; Max-Age=-99999999;';  
}

//Send comment video
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$( document ).ready(function() {
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
              <img class="direct-chat-img" src="/public/home/images/icon-user.png" alt="message user image">
              <div class="direct-chat-text text-white">
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
  $("#report-video").click(function() {
    $("#report-video").prop('disabled', true);
    let url = $(this).data("url");
    $.ajax({
          method: "POST",
          url: url
      })
      .done(function(response) {
          alert('Đã gửi thông báo tới hệ thống.');
          $("#report-video").prop('disabled', false);
      })
      .fail(function(error) {
          alert('Tạm thời xảy ra lỗi. Thử lại!');
          $("#report-video").prop('disabled', false);
          console.log(error);
      });

  }); 
  var video = document.getElementById('video-lesson');
  if (video !== null) {
    video.addEventListener('ended', function(e) {
      let autoPlay = this.getAttribute('autoplay');
      let url = this.getAttribute('data-url');
      $.ajax({
            method: "POST",
            url: url,
        })
        .done(function(response) {
          if (autoPlay == 'autoplay' && document.getElementById('next-lesson')) {
            document.getElementById('next-lesson').click();
          }
        })
        .fail(function(error) {
            console.log(error);
        });

      }); 
  }
});
function addToCart(url) {
  $.ajax({
        method: "POST",
        url: url,
    })
    .done(function(response) {
      if ($("#count-cart").length > 0){
        let count = Number($("#count-cart").text());
        $("#count-cart").text(count + 1);
      } else {
        let html = '<span id="count-cart">1</span>';
        $("#div-cart").append(html);
      }
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