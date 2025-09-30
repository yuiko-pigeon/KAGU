        <footer class="footer">
            <section class="footer__inner">
                <h2 class="footer__logo">
                    <img src="<?php echo get_theme_file_uri( 'picture/kagu.svg' ); ?>" alt="KAGUと白文字で書かれた画像" class="footer__logo-image footer__logo-image">
                </h2>
                <div class=footer__text-area>
                    <li class=footer__list>
                        <h3 class="footer__title footer__title--small-margin">Address</h3>
                        <p class="footer__text footer__text--medium-padding footer__text--bottom-border">〒000-1234 愛知県名古屋市1234</p>
                    </li>
                    <li class=footer__list>
                        <h3 class="footer__title footer__title--small-padding footer__title--small-margin">Navigation</h3>
                        <div class="footer__nav footer__nav--uppercase footer__nav--medium-padding footer__nav--bottom-border">
                        <?php if (has_nav_menu('footer')) : ?>
                                    <?php wp_nav_menu( array(
                                        'menu' => '',
                                        'container'=> false, //自動でulを囲うdivを消す
                                        'menu_class' => 'footer__menulist',//ulクラス
                                        'fallback_cb' => false, 
                                        'echo' => true,
                                        'depth' => 1,
                                        'theme_location' => 'footer',
                                        'item_spacing' => 'false'
                                    )); ?>
                                    <?php else : ?>
                                        <p class="footer__menulist">メニューはまだ設定されていません。</p>
                                    <?php endif; ?>
                        </div>
                        <div class="footer__nav-pc footer__nav--uppercase footer__nav--medium-padding footer__nav--bottom-border">
                        <?php if (has_nav_menu('footer-pc')) : ?>
                                    <?php wp_nav_menu( array(
                                        'menu' => '',
                                        'container'=> false, //自動でulを囲うdivを消す
                                        'menu_class' => 'footer__menulist',//ulクラス
                                        'fallback_cb' => false, 
                                        'echo' => true,
                                        'depth' => 1,
                                        'theme_location' => 'footer-pc',
                                        'item_spacing' => 'false'
                                    )); ?>
                                    <?php else : ?>
                                        <p class="footer__menulist">メニューはまだ設定されていません。</p>
                                    <?php endif; ?>
                        </div>
                    </li>
                    <li class=footer__list>
                        <h3 class="footer__title footer__title--uppercase footer__title--small-padding footer__title--small-margin">sns</h3>
                        <div class="footer__sns footer__sns--medium-padding footer__sns--bottom-border">
                        <?php if (has_nav_menu('footer-sns')) : ?>
                                    <?php wp_nav_menu( array(
                                        'menu' => '',
                                        'container'=> false, //自動でulを囲うdivを消す
                                        'menu_class' => 'footer__menulist',//ulクラス
                                        'fallback_cb' => false, 
                                        'echo' => true,
                                        'depth' => 1,
                                        'theme_location' => 'footer-sns',
                                        'item_spacing' => 'false'
                                    )); ?>
                                    <?php else : ?>
                                        <p class="footer__menulist">メニューはまだ設定されていません。</p>
                                    <?php endif; ?>
                        </div>
                    </li>
                </div>
                <div class="footer__copyright-area">
                    <small class="footer__copyright">&copy;KAGU 2025</small>
                    <img src="<?php echo get_theme_file_uri( 'picture/footer-sp.png' ); ?>" alt="木製の椅子の座面から脚が写っている写真" class="footer__image-sp js__footer-image">
                </div>
                <div class="footer__image">
                    <img src="<?php echo get_theme_file_uri( 'picture/footer-pc.png' ); ?>" alt="木製の椅子の座面から脚が写っている写真" class="footer__image-pc js__footer-image">
                </div>
            </footer>
        </div>
    </div>
    <?php wp_footer(); ?>
</body>
</html>