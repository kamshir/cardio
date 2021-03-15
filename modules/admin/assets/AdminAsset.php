<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\modules\admin\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/admin/styles.css',
    ];
    public $js = [
        'js/admin/bootstrap.min.js',
        'js/admin/bootstrap-datepicker.js',
        'js/admin/chart.min.js',
        'js/admin/chart-data.js',
        'js/admin/easypiechart.js',
        'js/admin/easypiechart-data.js',
        'js/admin/icons.js',
        'js/admin/custom.js',
        'js/admin/script.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
