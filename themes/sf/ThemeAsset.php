<?php


namespace app\themes\sf;

use yii\web\AssetBundle;
use yii\web\View;

class ThemeAsset extends AssetBundle
{

    public $sourcePath = __DIR__ . '/media';

    public $css = [
        'app.css',
    ];

    public $js = [
        'app.js',
    ];

    public $depends = [
        'app\assets\AppAsset',
        'app\assets\AutosizeAsset',
    ];

    public static function getAssetUrl($file)
    {
        $file = ltrim($file, '/');
        $am = \Yii::$app->assetManager;
        list(,$url) = $am->publish($am->getBundle(get_called_class())->sourcePath);
        return $url."/$file";
    }

    public static function registerJsFile($file, View $view)
    {
        $url = static::getAssetUrl($file);
        $view->registerJsFile($url, ['depends' => [get_called_class()]]);
    }

    public static function registerCssFile($file, View $view)
    {
        $url = static::getAssetUrl($file);
        $view->registerCssFile($url, ['depends' => [get_called_class()]]);
    }
}
