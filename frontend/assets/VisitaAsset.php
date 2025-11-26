<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class VisitaAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'template/css/style_visitas.css',
    ];

    public $js = [
       
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
