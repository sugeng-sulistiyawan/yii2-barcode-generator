<?php

namespace diecoding\barcode\generator;

use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * BarcodeAsset represents a collection of asset files, such as CSS, JS, images.
 * 
 * @link [sugeng-sulistiyawan.github.io](sugeng-sulistiyawan.github.io)
 * @author Sugeng Sulistiyawan <sugeng.sulistiyawan@gmail.com>
 * @copyright Copyright (c) 2023
 */
class BarcodeAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@npm/jsbarcode/dist';

    /**
     * @inheritdoc
     */
    public $js = [
        'JsBarcode.all.min.js',
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        YiiAsset::class,
    ];
}
