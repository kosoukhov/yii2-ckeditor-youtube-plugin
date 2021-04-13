YouTube embed CKEditor plugin for Yii2
======================================

Yii2 YouTube embed plugin (as widget) for CKEditor

Based on YouTube embed https://github.com/fonini/ckeditor-youtube-plugin/releases/tag/v2.1.18

[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](http://www.yiiframework.com/)
[![Latest Stable Version](https://poser.pugx.org/kosoukhov/yii2-ckeditor-youtube-plugin/v/stable)](https://packagist.org/packages/kosoukhov/yii2-ckeditor-youtube-plugin)
[![Total Downloads](https://poser.pugx.org/kosoukhov/yii2-ckeditor-youtube-plugin/downloads)](https://packagist.org/packages/kosoukhov/yii2-ckeditor-youtube-plugin)
[![Latest Unstable Version](https://poser.pugx.org/kosoukhov/yii2-ckeditor-youtube-plugin/v/unstable)](https://packagist.org/packages/kosoukhov/yii2-ckeditor-youtube-plugin)
[![License](https://poser.pugx.org/kosoukhov/yii2-ckeditor-youtube-plugin/license)](https://packagist.org/packages/kosoukhov/yii2-ckeditor-youtube-plugin)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require kosoukhov/yii2-ckeditor-youtube-plugin "^1.0"
```

or add

```
"kosoukhov/yii2-ckeditor-youtube-plugin": "^1.0"
```

to the require section of your `composer.json` file.


Usage example:
-------------

Once the widget is installed, use it in your code.

You must specify in the plugin dependencies the set of editor Asset to which you connect the plugin.

If you are using the https://github.com/2amigos/yii2-ckeditor-widget then an example code like this:

```php
class SetUp implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $container = Yii::$container;

        $container->set(YoutubeEmbed::class, ['depends' => ['dosamigos\ckeditor\CKEditorWidgetAsset']]);

        $container->set(CKEditor::class, [
            'preset' => 'standart',
            'clientOptions' => [
                    'extraPlugins' => $container->get(YoutubeEmbed::class)::getPluginName()
                ]            
        ]);
    }
}
```

If you are using the https://github.com/MihailDev/yii2-ckeditor then an example code like this:

```php
class SetUp implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $container = Yii::$container;

        $container->set(YoutubeEmbed::class, ['depends' => ['mihaildev\ckeditor\Assets']]);

        $container->set(CKEditor::class, [
            'editorOptions' => [
                    'extraPlugins' => $container->get(YoutubeEmbed::class)::getPluginName()
                ]
        ]);
    }
}
```

