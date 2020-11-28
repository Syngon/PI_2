$(function () {
  let Header = $('.header').position().top;
  console.log(Header);
  $('.about-btn').on('click touch', function () {
    const information = $('#information').position().top;
    console.log(information);
    $('html, body').animate(
    {
      scrollTop: information },
    600, 'easeOutCirc', () => {console.log('livin\' it up while i\'m goin\' down!');});
  });
  
  $('.top-btn').on('click touch', function (e) {
    const top = $('#nav-animation').position().top;
    console.log(top);
    $('html, body').animate(
    {
      scrollTop: top },
    600, 'easeOutCirc');
  });

  const startYear = 2020;
  let thisYear = new Date().getFullYear();
  if (thisYear === startYear) {
    $('#cw-year').html(startYear).css('font-size', '13px');
  } else {
    $('#cw-year').html(startYear + '-' + thisYear).css('font-size', '13px');;
  };
});

// Carousel Auto-Cycle
$(document).ready(function() {
  $('.carousel').carousel({
    interval: 6000
  })
});


