var $search = $(".c-search-bar");

// When search is clicked

$('.c-search-bar__toggle').on('click', function() {
  openSearchExpand()
});

// When something is typed

$('.c-search-bar__input').on('input', function() {
  handleText()
});

// When someone clicks out of search area

$(window).on("click", function(event){	
  if ( $search.has(event.target).length == 0 && !$search.is(event.target) ){
    if ($('.c-search-bar__input').hasClass('c-search-bar__input--active')) {
      closeSearchExpand()
    }
  }
});

// Functions

function openSearchExpand() {
  $('.c-search-bar__input').toggleClass('c-search-bar__input--active').focus();
  $('.c-search-bar__btn').find('svg').toggle();
}

function closeSearchExpand() {
  if ($('.c-search-bar__input').val()) {
    $('.c-search-bar__toggle').show();
    $('.c-search-bar__input').toggleClass('c-search-bar__input--active');
  } else {
    $('.js-search-bar__open').show();
    $('.js-search-bar__close').hide();
    $('.c-search-bar__input').removeClass('c-search-bar__input--active');
  }
}

function handleText() {
  if ($('.c-search-bar__input').val()) {
    $('.c-search-bar__toggle').hide();
    $('.js-search-bar__open').show();
    $('.js-search-bar__close').hide();
  } else {
    $('.c-search-bar__toggle').show();
    $('.js-search-bar__open').hide();
    $('.js-search-bar__close').show();
  }
}