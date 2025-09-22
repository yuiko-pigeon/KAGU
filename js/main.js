
document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.querySelector('.header__hamburger');
    const drawer = document.querySelector('.header__drawer');
    const body = document.querySelector('body');
    const blur = document.querySelectorAll('.header__intro-area,.main,.footer');
    
    hamburger.addEventListener('click', function() {
        this.classList.toggle('header__hamburger--active');
        // drawer.classList.toggle('is-open');
        drawer.classList.toggle('header__drawer-open');
        body.classList.toggle('body__scroll-none');
        
        blur.forEach(function(el) {
            el.classList.toggle('js-blur');
        });
    });

    window.addEventListener("resize", function() {
        if (window.innerWidth >= 767) {
          hamburger.classList.remove("header__hamburger-active");
          body.classList.remove("body__scroll-none");
          drawer.classList.remove("header__drawer-open"); 
          
          blur.forEach(function(el) {
            el.classList.remove('js-blur');
        });
        }
    });
});


