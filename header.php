<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/destyle.css@4.0.1/destyle.min.css" rel="stylesheet">
    <title>kagu</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <div class="wrapper">
        <header class="header">
        <img src="<?php echo get_theme_file_uri( 'picture/mv_sp.png' ); ?>" alt="木の机の上に道具を持った左手を乗せている写真" class="header__mainvisual">
            <div class="header__nav">
                <div class="header__nav-titlearea">
                    <h1 class="header__title"><?php if ( function_exists( 'get_custom_logo' ) ) {
                                        $logo_html = get_custom_logo();

                                        if ( $logo_html ) {
                                            // WordPressが自動で出力する class="custom-logo" を、自分の好きなクラス名に置き換える
                                            echo str_replace( 'class="custom-logo"', 'class="header__logo"', $logo_html );
                                        } else {
                                            // カスタムロゴが未設定の場合はデフォルト画像を表示
                                            echo '<img src="' . esc_url( get_theme_file_uri( 'picture/kagu-header.png' ) ) . '" class="header__logo" alt="KAGU ロゴ">';
                                        }
                                    } ?>
                    </h1>
                    <div class="header__hamburger"></div>
                </div>
                <nav class="header__drawer">
                <?php if (has_nav_menu('hamburger')) : ?>
                    <?php wp_nav_menu( array(
                        'menu' => '',
                        'container'=> false, //自動でulを囲うdivを消す
                        'menu_class' => 'header__menulist',//ulクラス
                        'fallback_cb' => false, 
                        'echo' => true,
                        'depth' => 1,
                        'theme_location' => 'hamburger',
                        'item_spacing' => 'false'
                    )); ?>
                    <?php else : ?>
                        <p class="header__menulist">メニューはまだ設定されていません。</p>
                    <?php endif; ?>
                </nav>
            </div>
                

            <p class="header__intro">
                <span class="header__intro-title">
                    あなたとともに､<br>
                    変化する家具
                </span>
            </p>
            <p class="header__intro header__intro--small">
                <span class="header__intro-text">
                    木の香り､手のぬくもり､時間が育てる風合い<br>
                    ここにしかない家具を､あなたの暮らしへ。
                </span>
            </p>
            <div class="header__scroll">
                <div class="header__scroll-dot">
                    <!-- dotを入れる。擬似要素？ -->
                </div>
                <span class="header__scroll-text">
                    ScrollDown
                </span>
            </div>
        </header>