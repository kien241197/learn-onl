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

$('.slick-single-lq').slick({
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



var interval_obj = setTimeout(function(){
  $('.phone-opacity').css('display','none');
  setInterval(function(){
    $('.phone-opacity').css('display','block');
    setTimeout(function(){
      $('.phone-opacity').css('display','none');
    }, 5000);
  }, 59000);
}, 5000);


$('.js-search').click(function(){
  $('.js-form-search').toggle();
});

$('.js-search-mb').click(function(){
  $('.js-form-search-mb').toggle();
});

$('.js-menu-mobile').click(function(){
  $('.menu-mobile-custom').fadeIn();
});
$('.js-close').click(function(){
  $('.menu-mobile-custom').fadeOut();
});
