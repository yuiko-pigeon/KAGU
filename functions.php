<?php
//テーマサポート
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-logo' );
add_theme_support( 'custom-background');
add_theme_support( 'wp-block-styles' );
add_theme_support( 'align-wide' );
add_theme_support( 'editor-styles' ); //エディタースタイルを有効化


//CSSファイルの読み込み ress.cssの後にstyle.cssを読み込む
function my_enqueue_assets(){

    wp_enqueue_style('style',get_theme_file_uri('/css/style.css'),array(),'1.0.0','all');
    wp_enqueue_script('rellax',get_theme_file_uri('/js/rellax.js'), array(), null, true );
    wp_enqueue_script('lenis',get_theme_file_uri('/node_modules/@studio-freight/lenis/dist/lenis.js'), array(), null, true );
    wp_enqueue_script('jquery',get_theme_file_uri('/js/jquery-3.7.1.slim.min.js'),'','3.7.1',true);
    wp_enqueue_script('main',get_theme_file_uri('/js/main.js'),array('jquery','lenis'),'',true);
    wp_enqueue_style('noto-sans','https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap',array(),null);
    wp_enqueue_style('Lato','https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap',array(),null);
    
    wp_add_inline_script('rellax','document.addEventListener("DOMContentLoaded", function() {
        console.log("Rellax init");
        
    var rellax = new Rellax(".rellax");
        });'
    );

    wp_localize_script('main', 'wpData', [
        'isFrontPage' => is_front_page()
      ]);

    // preconnectをwp_headに追加
    add_action('wp_head', function() {
        echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
        echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    }, 5);

}
add_action('wp_enqueue_scripts','my_enqueue_assets');

add_action('after_setup_theme',function(){
    register_nav_menus( array(
        'header-pc' => 'ヘッダーのメニュー',
        'hamburger' => 'ハンバーガーメニュー',
        'footer' => 'フッターメニュー',
        'footer-sns' => 'フッターSNSメニュー',
        'footer-pc' => 'フッターPCメニュー'
    ));
});

function add_menu_headerLink_class($atts, $item, $args, $depth) {
   
    // $argsがオブジェクトかつtheme_locationが設定されているかをチェック
    if (isset($args->theme_location) && $args->theme_location === 'hamburger') {
       
        // 全てのaタグにjs__menu-itemを付与
        $classes = 'header__menu-item-area';
        // 既存のクラスがある場合は追加、ない場合は新規作成
        if (isset($atts['class'])) {
            $atts['class'] .= ' ' . $classes;
        } else {
            $atts['class'] = $classes;
        }
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_headerLink_class', 10, 4);//nav_menu_link_attributesはaタグにclass名追加

function custom_block_styles() {
    // 独自のブロックスタイルを登録する
    register_block_style(
        'core/image', // ブロック名
        array(
            'name'         => 'imagegroup__image--small', // スタイル名
            'label'        => '隣り合う大小画像の小', // スタイルの表示名
        )
    );
    register_block_style(
        'core/image', // ブロック名
        array(
            'name'         => 'imagegroup__image--big', // スタイル名
            'label'        => '隣り合う大小画像の大', // スタイルの表示名
        )
    );
    register_block_style(
        'core/columns', // ブロック名
        array(
            'name'         => 'imagegroup__image', // スタイル名
            'label'        => '隣り合う大小画像グループ', // スタイルの表示名
        )
    );
    
    register_block_style(
        'core/image', // ブロック名
        array(
            'name'         => 'imagegroup__image--bottom', // スタイル名
            'label'        => 'about下部の画像', // スタイルの表示名
        )
    );
    register_block_style(
        'core/image', // ブロック名
        array(
            'name'         => 'gallery__image', // スタイル名
            'label'        => 'galleryセクションの画像', // スタイルの表示名
        )
    );
    register_block_style(
        'core/group', // ブロック名
        array(
            'name'         => 'emphasis', // スタイル名
            'label'        => '横大文字スクロール', // スタイルの表示名
        )
    );
    register_block_style(
        'core/paragraph', // ブロック名
        array(
            'name'         => 'emphasis__text', // スタイル名
            'label'        => '横大文字スクロール', // スタイルの表示名
        )
    );
    register_block_style(
        'core/heading', // ブロック名
        array(
            'name'         => 'section__title', // スタイル名
            'label'        => '見出し２', // スタイルの表示名
        )
    );
    register_block_style(
        'core/paragraph', // ブロック名
        array(
            'name'         => 'section__lead', // スタイル名
            'label'        => 'メインビジュアル下テキスト大', // スタイルの表示名
        )
    );
    register_block_style(
        'core/paragraph', // ブロック名
        array(
            'name'         => 'section__text', // スタイル名
            'label'        => 'メインビジュアル下テキスト小', // スタイルの表示名
        )
    );
    register_block_style(
        'core/paragraph', // ブロック名
        array(
            'name'         => 'section__text--tight', // スタイル名
            'label'        => 'feature概要テキスト', // スタイルの表示名
        )
    );
    register_block_style(
        'core/spacer', // ブロック名
        array(
            'name'         => 'spacer', // スタイル名
            'label'        => '花瓶のある丸い机画像の上の余白' // スタイルの表示名
        )
    );
    register_block_style(
        'core/spacer', // ブロック名
        array(
            'name'         => 'spacer__large', // スタイル名
            'label'        => '花瓶のある丸い机画像の下の余白' // スタイルの表示名
        )
    );
    register_block_style(
        'core/spacer', // ブロック名
        array(
            'name'         => 'spacer__top', // スタイル名
            'label'        => 'about,productタイトル上余白' // スタイルの表示名
        )
    );
    register_block_style(
        'core/spacer', // ブロック名
        array(
            'name'         => 'spacer__top--xsmall', // スタイル名
            'label'        => 'featureタイトル上余白' // スタイルの表示名
        )
    );
    register_block_style(
        'core/spacer', // ブロック名
        array(
            'name'         => 'spacer__top--small', // スタイル名
            'label'        => 'footerタイトル上余白' // スタイルの表示名
        )
    );
    register_block_style(
        'core/spacer', // ブロック名
        array(
            'name'         => 'spacer__xlarge', // スタイル名
            'label'        => 'product gallery title上余白' // スタイルの表示名
        )
    );
    register_block_style(
        'core/media-text', // ブロック名
        array(
            'name'         => 'figure__column', // スタイル名
            'label'        => 'featureテキスト(上)画像(下)' // スタイルの表示名
        )
    );
    register_block_style(
        'core/columns', // ブロック名
        array(
            'name'         => 'figure__columns', // スタイル名
            'label'        => 'figureカード' // スタイルの表示名
        )
    );
    register_block_style(
        'core/group', // ブロック名
        array(
            'name'         => 'feature', // スタイル名
            'label'        => 'featureセクション' // スタイルの表示名
        )
    );
    register_block_style(
        'core/group', // ブロック名
        array(
            'name'         => 'feature', // スタイル名
            'label'        => 'featureセクション' // スタイルの表示名
        )
    );
    register_block_style(
        'core/group', // ブロック名
        array(
            'name'         => 'about', // スタイル名
            'label'        => 'aboutセクション' // スタイルの表示名
        )
    );
    register_block_style(
        'core/group', // ブロック名
        array(
            'name'         => 'about__textarea-bottom', // スタイル名
            'label'        => 'about下部テキストエリア' // スタイルの表示名
        )
    );
    register_block_style(
        'core/group', // ブロック名
        array(
            'name'         => 'product', // スタイル名
            'label'        => 'productセクション' // スタイルの表示名
        )
    );
    register_block_style(
        'core/group', // ブロック名
        array(
            'name'         => 'gallery', // スタイル名
            'label'        => 'galleryセクション' // スタイルの表示名
        )
    );
    register_block_style(
        'core/group', // ブロック名
        array(
            'name'         => 'section__title-area', // スタイル名
            'label'        => 'アニメーション用タイトルエリア' // スタイルの表示名
        )
    );
    register_block_style(
        'core/group', // ブロック名
        array(
            'name'         => 'section__lead-area', // スタイル名
            'label'        => 'アニメーション用リードエリア' // スタイルの表示名
        )
    );
    register_block_style(
        'core/group', // ブロック名
        array(
            'name'         => 'section__lead-area-center', // スタイル名
            'label'        => 'アニメーション用リードエリア中央よせ' // スタイルの表示名
        )
    );
    register_block_style(
        'core/figure', // ブロック名
        array(
            'name'         => 'figure__pudding-bottom', // スタイル名
            'label'        => '３つ目の画像下の余白を０に(PC)' // スタイルの表示名
        )
    );
}
add_action( 'init', 'custom_block_styles' );
