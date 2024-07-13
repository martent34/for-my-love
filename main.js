// script.js
let lastTime = 0;
const interval = 100; // تحديد الفاصل الزمني بين كل قلب وآخر (100 مللي ثانية)

document.addEventListener('mousemove', function(e) {
  const currentTime = Date.now();

  if (currentTime - lastTime >= interval) {
    let heart = document.createElement('div');
    heart.className = 'heart';
    heart.style.left = `${e.pageX}px`;
    heart.style.top = `${e.pageY}px`;

    document.getElementById('heart-container').appendChild(heart);

    setTimeout(() => {
      heart.remove();
    }, 1000); // إزالة القلب بعد انتهاء الأنيميشن

    lastTime = currentTime;
  }
});







  