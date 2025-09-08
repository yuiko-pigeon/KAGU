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
    wp_enqueue_script('jquery',get_theme_file_uri('/js/jquery-3.7.1.slim.min.js'),'','3.7.1',false);
    wp_enqueue_script('main',get_theme_file_uri('/js/main.js'),'jquery','',true);
    

    wp_localize_script('main', 'wpData', [
        'isFrontPage' => is_front_page()
      ]);
}
add_action('wp_enqueue_scripts','my_enqueue_assets');

add_action('after_setup_theme',function(){
    register_nav_menus( array(
        'header' => 'ヘッダーのメニュー',
        'hamburger' => 'ハンバーガーメニュー',
        'footer' => 'フッターメニュー',
        'footer-sns' => 'フッターSNSメニュー',
    ));
});

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
        'core/column', // ブロック名
        array(
            'name'         => 'imagegroup__image--after', // スタイル名
            'label'        => '隣り合う大小画像の大', // スタイルの表示名
        )
    );
    register_block_style(
        'core/column', // ブロック名
        array(
            'name'         => 'imagegroup__image--before', // スタイル名
            'label'        => '隣り合う大小画像の小', // スタイルの表示名
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
            'name'         => 'spacer__top--xxsmall', // スタイル名
            'label'        => 'product gallery上余白' // スタイルの表示名
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
            'name'         => 'about', // スタイル名
            'label'        => 'aboutセクション' // スタイルの表示名
        )
    );
    register_block_style(
        'core/group', // ブロック名
        array(
            'name'         => 'gallery', // スタイル名
            'label'        => 'galleryセクション' // スタイルの表示名
        )
    );
}
add_action( 'init', 'custom_block_styles' );
