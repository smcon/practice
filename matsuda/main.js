/*マウスストカー*/
const stalker = document.getElementById('mouse-stalker');
let hovFlag = false;

document.addEventListener('mousemove', function (e) {
    stalker.style.transform = 'translate(' + e.clientX + 'px, ' + e.clientY + 'px)';
});

const linkElem = document.querySelectorAll('a:not(.no_stick_)');
for (let i = 0; i < linkElem.length; i++) {
    linkElem[i].addEventListener('mouseover', function (e) {
        hovFlag = true;
        stalker.classList.add('is_active');

    });
    linkElem[i].addEventListener('mouseout', function (e) {
        hovFlag = false;
        stalker.classList.remove('is_active');
    });
}

$('.slider').slick({
  autoplay:true, // 自動再生を設定
  autoplaySpeed:1500, // スライド切り替えの時間を設定
  dots:true // インジケーターを表示
});
