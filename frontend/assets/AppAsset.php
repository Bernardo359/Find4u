<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        // Bootstrap NÃO colocar aqui (já vem do Yii)
        'template/css/fontawesome.css',
        'template/css/templatemo-villa-agency.css',
        'template/css/owl.css',
        'template/css/animate.css',
        'template/css/site.css',
        

        // CDN OK
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
    ];

    public $js = [
        'template/js/isotope.min.js',
        'template/js/owl-carousel.js',
        'template/js/counter.js',
        'template/js/custom.js',
        'template/js/bootstrap.min.js',
        'template/js/about.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',            // Carrega jQuery automaticamente
        'yii\bootstrap5\BootstrapAsset',       // Carrega Bootstrap CSS
        'yii\bootstrap5\BootstrapPluginAsset', // Carrega Bootstrap JS
    ];
}