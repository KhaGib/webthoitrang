const textSlider = document.getElementById('text-slider');
let position = window.innerWidth;
function scrolllText() {
    position--;
    if (position < -textSlider.offsetWidth) {
        position = window.innerWidth;
    }
    textSlider.style.transform = `translateX(${position}px)`;
    requestAnimationFrame(scrolllText);
}
scrolllText();
//slider
const sliders = document.querySelectorAll('.slide-img'); //querySelectorAll => Chọn nhiều phần tử
let currentIndex = 0;
function slideShow(index) {
    sliders.forEach((slide, i) => {
        slide.classList.toggle('active', i == index);    //classList/toggle() => Thêm/gỡ class theo điều kiện
    });
}
document.getElementById('prev').addEventListener('click', () => {  //addEventListener => gắng sự kiện cho nút
    currentIndex = (currentIndex - 1 + sliders.length) % sliders.length;
    slideShow(currentIndex);
})
document.getElementById('next').addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % sliders.length;
    slideShow(currentIndex);
})
setInterval(() => {                                                //setinterval tự động chạy lặp đi lặp lại
    currentIndex = (currentIndex + 1) % sliders.length;
    // console.log("Current Index: ", currentIndex);
    slideShow(currentIndex);
}, 1000);
 const icon = document.getElementById('search-icon');
  const input = document.getElementById('search-input');
  const form = document.querySelector('.search-container');

  let shown = false;
  icon.addEventListener('click', function (e) {
    if (!shown) {
      e.preventDefault(); // chưa cho submit
      input.classList.add('show');
      input.focus();
      shown = true;
    } else {
      form.submit(); // lần 2: submit form
    }
  });

