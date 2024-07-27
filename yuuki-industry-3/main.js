$(function() {
  $('.humburger').on('click', function() {
    humburger();
  });
  $('#navi a').on('click', function() {
    humburger();
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



function humburger() {
  $('.humburger').toggleClass('active');
  if ($('.humburger').hasClass('active')) {
    $('#navi-sp').addClass('active');
  } else {
    $('#navi-sp').removeClass('active');
  }
}
