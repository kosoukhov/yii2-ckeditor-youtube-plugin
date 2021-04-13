<?php
/*
 * Copyright (c) 2021.
 * Vadim E. Kosoukhov
 * kosoukhov@gmail.com
 */

namespace kosoukhov\ckeditor_youtube_plugin;


use Yii;
use yii\web\AssetBundle;

class YoutubeAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/kosoukhov/yii2-ckeditor-youtube-plugin/dist';

    /**
     * @var string[]
     */
    public $js = [
        'js/youtube/plugin.js',
    ];

    /**
     * @var array
     */
    public $depends = [];

    public function init()
    {
        parent::init();

        $this->publishOptions['afterCopy'] = function ($from, $to) {
            $pos = strpos($to, 'plugin.js');
            if ($pos > 0) {
                $assetUrl = Yii::$app->assetManager->getPublishedUrl("@vendor/kosoukhov/yii2-ckeditor-youtube-plugin/dist");
                $str = file_get_contents($to);
                $str = str_replace('icon : this.path + \'images/icon.png\'', 'icon : \'' . $assetUrl . '/js/youtube/images/icon.png\'', $str);
                file_put_contents($to, $str);
            }
        };

        $pos = strpos(Yii::$app->language, '-');
        if ($pos > 0) {
            $lang = substr(Yii::$app->language, 0, $pos);
            $this->js[] = 'js/youtube/lang/' . $lang . '.js';
        }
    }
}