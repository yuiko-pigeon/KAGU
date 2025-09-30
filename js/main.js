
//loadingカウントアップ
let count = 0;
const counterElement = document.querySelector('.js__loading-count');
const loadingElement = document.querySelector('.loading');
const mainContent = document.querySelector('.js__main-content');

// カウントアップの処理
const interval = setInterval(() => {
    count++;
    counterElement.textContent = count + '%';
    
    if (count >= 100) {
        clearInterval(interval);

        // fade-outクラスを追加
        loadingElement.classList.add('js__fade-out')
        // ローディング終了
        // トランジションが終わる 1s 後に display: none を設定
        loadingElement.addEventListener('transitionend', () => {
            loadingElement.style.display = 'none';
        }, { once: true });
    }
}, 20); // 20ミリ秒ごとにカウントアップ（約2秒で100に到達）

document.querySelectorAll('a[href^="#"], .header__logo').forEach(link => {
    link.addEventListener('click', e => {
        e.preventDefault();
        const target = link.getAttribute('href') || '#';
        const el = target === '#' || target === '/' ? document.body : document.querySelector(target);
        if (el) el.scrollIntoView({ behavior: 'smooth' });
    });
});

//drawermenuのaタグ内にspan追加
document.querySelectorAll('.header__menulist a').forEach(a => {
    a.innerHTML = `<span class="js__menu-item">${a.textContent}</span>`;
  });


//Scrolldownモーション
const circle = document.querySelector('.header__scroll');
const circleHeight = circle.offsetHeight;

window.addEventListener('scroll', () => {
　　// スクロール量を割合に変換（0〜1をループさせる）
const progress = (window.scrollY / 150) % 1; // 数字を変えるとスピード調整
// 円の中を下から上へ移動
const y = progress * (circleHeight + 4) - 4;

  // 擬似要素を動かすにはCSS変数を使う
  circle.style.setProperty('--dot-top', `${y}px`);
});

document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.querySelector('.header__hamburger');
    const drawer = document.querySelector('.header__drawer');
    const body = document.querySelector('body');
    const menuItems = document.querySelectorAll('.header__menu-item-area');
    const blur = document.querySelectorAll('.header__intro-area,.main,.footer');
    const drawerItem = document.querySelectorAll('.js__menu-item');
    
    hamburger.addEventListener('click', function() {
        this.classList.toggle('header__hamburger--active');
        drawer.classList.toggle('header__drawer-open');
        body.classList.toggle('body__scroll-none');
        
        drawerItem.forEach(function(el) {
            el.classList.toggle('js__title-in');
        });
        
        blur.forEach(function(el) {
            el.classList.toggle('js__blur');
        });
    });

    menuItems.forEach(function(menuItem){
        menuItem.addEventListener('click', function() {
            hamburger.classList.remove('header__hamburger--active');
            drawer.classList.remove('header__drawer-open');
            body.classList.remove('body__scroll-none');
            
            drawerItem.forEach(function(el) {
                el.classList.remove('js__title-in');
            });
            
            blur.forEach(function(el) {
                el.classList.remove('js__blur');
            });
        });
    });

    window.addEventListener("resize", function() {
        if (window.innerWidth >= 767) {
          hamburger.classList.remove("header__hamburger--active");
          body.classList.remove("body__scroll-none");
          drawer.classList.remove("header__drawer-open");
          drawerItem.forEach(function(el) {
            el.classList.remove('js__title-in');
        });
          blur.forEach(function(el) {
            el.classList.remove('js__blur');
        });
        }
    });
});



// スクロール監視
window.addEventListener('scroll', () => {
    const elements = document.querySelectorAll('.is-style-section__title,.is-style-section__lead');
    
    elements.forEach(el => {
      const rect = el.getBoundingClientRect();
      const isVisible = rect.top < window.innerHeight+ 100;
      
      if (isVisible) {
        el.classList.add('js__title-in');
      }
    });
  });
window.addEventListener('scroll', () => {
    const elements = document.querySelectorAll(
        '.is-style-section__text,.is-style-section__text--tight,.is-style-imagegroup__image--small,.is-style-imagegroup__image--big,.is-style-imagegroup__image--bottom');
    
    elements.forEach(el => {
      const rect = el.getBoundingClientRect();
      const isVisible = rect.top < window.innerHeight+ 60;
      
      if (isVisible) {
        el.classList.add('js__text-appear');
      }
    });
  });
window.addEventListener('scroll', () => {
    const elements = document.querySelectorAll(
        '.is-style-imagegroup__image--small,.is-style-imagegroup__image--bottom,.wp-block-media-text__media,.is-style-gallery__image,.js__footer-image');
    
    elements.forEach(el => {
      const rect = el.getBoundingClientRect();
      const isVisible = rect.top < window.innerHeight+ 60;
      
      if (isVisible) {
        el.classList.add('js__image-appearfast');
      }
    });
  });
window.addEventListener('scroll', () => {
    const element = document.querySelector(
        '.is-style-imagegroup__image--big');
    
    if(element) {
      const rect = element.getBoundingClientRect();
      const isVisible = rect.top < window.innerHeight+ 60;
      
      if (isVisible) {
        element.classList.add('js__image-appear');
      }
    }
});
  


