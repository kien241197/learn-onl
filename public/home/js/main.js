$('.slick-banner').slick({
  dots: false,
  infinite: true,
  speed: 500,
  slidesToShow: 1,
  autoplaySpeed:3000,
  autoplay:true,
});

$('.slick-feedback').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  arrows: false,
  fade: false,
  dots:true,
  autoplay: true,
  autoplaySpeed: 3000,
  speed: 1000,
  infinite: true,
  responsive: [{
    breakpoint: 992,
    settings: {
      slidesToShow: 3,
      slidesToScroll: 1,
    },
  },
  {
    breakpoint: 991,
    settings: {
      slidesToShow: 2,
      slidesToScroll: 1,
    },
  },
  {
    breakpoint: 480,
    settings: {
      slidesToShow: 1,
      slidesToScroll: 1,
    },
  },
  ],
});



var interval_obj = setInterval(function(){
  $('.phone-opacity').css('display','none');
  setInterval(function(){
    $('.phone-opacity').css('display','block');
   setInterval(function(){
      $('.phone-opacity').css('display','none');
      setInterval(function(){
        $('.phone-opacity').css('display','block');
      }, 180000);
    }, 5000);
  }, 180000);
}, 5000);

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