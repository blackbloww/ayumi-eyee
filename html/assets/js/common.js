$(document).ready(function(){

  // content sliders
  $('.content-slider-ft').slick({
      arrows: false,          
      infinite: true,         
      speed: 500,           
      slidesToShow: 9,       
      slidesToScroll: 1,    
      autoplay: true,         
      autoplaySpeed: 2200,
      responsive: [
        {
          breakpoint: 1081,
          settings: {
            slidesToShow: 7
          }
        },
        {
          breakpoint: 769,
          settings: {
            slidesToShow: 5
          }
        }
      ] 
  });

  $('.content-slider-top').slick({
      arrows: false,          
      infinite: true,         
      speed: 500,           
      slidesToShow: 9,       
      slidesToScroll: 1,   
      autoplay: true,         
      autoplaySpeed: 2000,   
      rtl: true,
      responsive: [
        {
          breakpoint: 1081,
          settings: {
            slidesToShow: 7
          }
        },
        {
          breakpoint: 769,
          settings: {
            slidesToShow: 5
          }
        }
      ]             
  });

  // voice slider 
  $('.voice-slider').on('init', function(event, slick){
    const totalSlides = slick.slideCount;
    let currentSlide = slick.currentSlide;
    let progress = ((currentSlide + 1) / totalSlides) * 100;
    $('.progress-bar').css('width', progress + '%');
  });

  $('.voice-slider').on('afterChange', function(event, slick, currentSlide){
    let progress = ((currentSlide + 1) / slick.slideCount) * 100;
    $('.progress-bar').css('width', progress + '%');
  });

  $('.voice-slider').slick({
    arrows: false,
    infinite: true, 
    speed: 500,
    slidesToShow: 3.9, 
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
        {
          breakpoint: 1081,
          settings: {
            slidesToShow: 2.9
          }
        },
        {
          breakpoint: 769,
          settings: {
            slidesToShow: 1.1,
          }
        }
      ] 
  });

  // pre slider 
  $('.pre-content-slider').on('init', function(event, slick){
    const totalSlidesPre = slick.slideCount;
    let currentSlidePre = slick.currentSlide;
    let progressPre = ((currentSlidePre + 1) / totalSlidesPre) * 100;
    $('.pre-progress-bar').css('width', progressPre + '%');
  });

  $('.pre-content-slider').on('afterChange', function(event, slick, currentSlidePre){
    let progressPre = ((currentSlidePre + 1) / slick.slideCount) * 100;
    $('.pre-progress-bar').css('width', progressPre + '%');
  });

  $('.pre-content-slider').slick({
    arrows: false,
    infinite: true, 
    speed: 500,
    slidesToShow: 4.1, 
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
        {
          breakpoint: 1081,
          settings: {
            slidesToShow: 3.1
          }
        },
        {
          breakpoint: 769,
          settings: {
            slidesToShow: 1.1
          }
        }
      ] 
  });
});

//click question
$(document).ready(function(){
  $('.sec-question-main .item').on('click', function(){
    const $item = $(this);
    const $ft = $item.find('.ft');
    const $right = $item.find('.right');

    if ($item.hasClass('open')) {
      $ft.css('height', $ft[0].scrollHeight + 'px');
      setTimeout(() => {
        $ft.css('height', '0');
      }, 10);
      $item.removeClass('open');
      $right.removeClass('active');
    } else {
      // Đang đóng → mở ra
      $ft.css('height', $ft[0].scrollHeight + 'px');
      $item.addClass('open');
      $right.addClass('active');

      $ft.one('transitionend', function() {
        if ($item.hasClass('open')) {
          $ft.css('height', 'auto');
        }
      });
    }
  });
});

// header 
$(document).ready(function () {
  $('.pup').on('click', function () {
    $(this).toggleClass('active');
    $('.nav').toggleClass('active');
    $('.overlay').toggleClass('active');
  });

  // Optional: Click overlay để đóng menu
  $('.overlay').on('click', function () {
    $(this).removeClass('active');
    $('.pup').removeClass('active');
    $('.nav').removeClass('active');
  });
});

// header scroll
$(window).on('scroll', function () {
  if ($(this).scrollTop() > 0) {
    $('.header').addClass('scrolled');
  } else {
    $('.header').removeClass('scrolled');
  }
});
