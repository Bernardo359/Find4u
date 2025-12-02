<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class BackofficeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web'; 
    public $js = [
        'templateBack/js/backoffice.js',
        'templateBack/js/anuncio-form.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
        'yii\bootstrap5\BootstrapPluginAsset',
       // 'frontend\assets\AppAsset',  // Herda também o AppAsset para ter acesso ao Font Awesome do template

    ];
    public $css = [
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
        'templateBack/css/backoffice.css',
        'templateBack/css/form-anuncio.css',
    ];
}