<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/magnific-popup.css',
        'css/animate.css',
        'css/style.css',
        'css/main.css',
        'css/info.css',
    ];
    public $js = [
        'js/modernizr-2.6.2.min.js',
        'js/jquery.easing.1.3.js',
        'js/jquery.waypoints.min.js',
        'js/jquery.countTo.js',
        'js/jquery.magnific-popup.min.js',
        'js/magnific-popup-options.js',
        'js/sticky-kit.min.js',
        'js/sweetalert2.js',
        'js/all.min.js',
        'js/main.js',
        'js/script.js',
        'js/slider.js',
        'js/icons.js',
        'js/contacts.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
