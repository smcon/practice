$(function() {
  $('.hamburger').on('click', function() {
    hamburger();
  });
  $('#navi a').on('click', function() {
    hamburger();
  });
  // ページ内リンクのスクロールをなめらかにする（スムーズスクロール）
  $('a[href^="#"]').click(function () {
    const speed = 500;
    const href = $(this).attr('href');
    let $target;
    if (href == '#') {
      $target = $('html');
    }
    else {
      $target = $(href);
    }
    const position = $target.offset().top;
    $('html, body').animate({ 'scrollTop': position }, speed, 'swing');
    return false;
  });
});



function hamburger() {
  $('.hamburger').toggleClass('active');
  if ($('.hamburger').hasClass('active')) {
    $('#navi').addClass('active');
  } else {
    $('#navi').removeClass('active');
  }
}
