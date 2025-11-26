<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'template/vendor/bootstrap/css/bootstrap.min.css',
        'template/css/fontawesome.css',
        'template/css/templatemo-villa-agency.css',
        'template/css/owl.css',
        'template/css/animate.css',
        'template/css/site.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
    ];
    public $js = [
        'template/vendor/jquery/jquery.min.js',
        'template/vendor/bootstrap/js/bootstrap.bundle.min.js',
        'template/js/isotope.min.js',
        'template/js/owl-carousel.js',
        'template/js/counter.js',
        'template/js/custom.js',
        'template/js/bootstrap.min.js',
        'template/js/about.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
