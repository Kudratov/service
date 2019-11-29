<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset1 extends AssetBundle
{
    // public $basePath = '@webroot';
    // public $baseUrl = '@web';
    public $sourcePath = '@bower/backend';
    public $css = [
       
       'docs/metro/css/metro-all.css?ver=@@b-version',
        'docs/highlight/styles/github.css', 
        'docs/docsearch/docsearch.min.css', 
        'docs/css/site.css', 

    ];
    public $js = [
        'docs/docsearch/docsearch.min.js', 
        //'docs/js/jquery-3.3.1.min.js',
        'docs/highlight/highlight.pack.js',
        'docs/js/clipboard.min.js',
        'docs/metro/js/metro.js?ver=@@b-version',
        'docs/js/holder.min.js',
        'docs/js/site.js',
         
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
       
    ];
}
