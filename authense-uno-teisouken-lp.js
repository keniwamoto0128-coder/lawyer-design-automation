/* =========================
  AUTHENSE UNO LP JS
  - スムーススクロール補助
  - FAQ開閉補助（JS無効でも閲覧可）
========================= */
(function () {
  'use strict';

  var root = document.querySelector('.auth-lp');
  if (!root) return;

  var links = root.querySelectorAll('a[href^="#"]');
  links.forEach(function (link) {
    link.addEventListener('click', function (event) {
      var id = link.getAttribute('href');
      if (!id || id === '#') return;
      var target = root.querySelector(id);
      if (!target) return;
      event.preventDefault();
      var header = root.querySelector('.auth-header-wrap');
      var offset = header ? header.offsetHeight + 8 : 0;
      var top = target.getBoundingClientRect().top + window.scrollY - offset;
      window.scrollTo({ top: top, behavior: 'smooth' });
    });
  });

  var faqItems = root.querySelectorAll('.auth-faq details');
  faqItems.forEach(function (item) {
    item.addEventListener('toggle', function () {
      if (!item.open) return;
      faqItems.forEach(function (other) {
        if (other !== item) other.open = false;
      });
    });
  });
})();
