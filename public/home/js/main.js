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