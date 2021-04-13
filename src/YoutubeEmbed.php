<?php
/*
 * Copyright (c) 2021.
 * Vadim E. Kosoukhov
 * kosoukhov@gmail.com
 */

namespace kosoukhov\ckeditor_youtube_plugin;


use Yii;
use yii\base\Widget;


class YoutubeEmbed extends Widget
{

    public array $depends = [];

    public static function getPluginName(): string
    {
        return 'youtube';
    }

    public function init()
    {
        parent::init();
        $this->renderWidget();
    }

    public function renderWidget()
    {
        $this->registerPlugin();
    }

    public function registerPlugin()
    {
        $this->registerAssetBundle();
        $view = $this->getView();
        $view->registerJs("CKEDITOR.plugins.addExternal('youtube', 'js/youtube/plugin.js', '');", $view::PH_BODY_END);
    }

    public function registerAssetBundle()
    {
        $view = $this->getView();
        YoutubeAsset::register($view)->depends = $this->depends;
    }
}