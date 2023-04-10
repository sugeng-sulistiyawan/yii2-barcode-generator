<?php

namespace diecoding\barcode\generator;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * Barcode widget.
 * 
 * @link [sugeng-sulistiyawan.github.io](sugeng-sulistiyawan.github.io)
 * @author Sugeng Sulistiyawan <sugeng.sulistiyawan@gmail.com>
 * @copyright Copyright (c) 2023
 */
class Barcode extends Widget
{
	/** 
	 * CODE128 is one of the more versatile barcodes. 
	 * It has support for all 128 ASCII characters but does also encode numbers efficiently. 
	 * It has three modes (A/B/C) but can switch between them at any time. 
	 * CODE128 is the default barcode that JsBarcode will choose if nothing else is specified.
	 */
	const CODE128  = "CODE128";
	const CODE128A = "CODE128A";
	const CODE128B = "CODE128B";
	const CODE128C = "CODE128C";

	/** 
	 * EAN comes in a variety of forms, most commonly used is EAN-13 (GTIN-13) 
	 * that is used on world wide to marking the identity of products.
	 * 
	 * Supports the formats EAN-13, EAN-8 and UPC as well as 
	 * the barcode addons EAN-5 and EAN-2.
	 */
	const EAN13 = "EAN13";
	const UPC   = "UPC";
	const EAN8  = "EAN8";
	const EAN5  = "EAN5";
	const EAN2  = "EAN2";

	/** 
	 * CODE39 is an old barcode type that can encode numbers, uppercase letters 
	 * and a number of special characters (-, ., $, /, +, %, and space). 
	 * It has been a common barcode type in the past but CODE128 
	 * is recommended if not for legacy reasons.
	 */
	const CODE39 = "CODE39";

	/** 
	 * ITF-14 (Interleaved Two of Five) is the GS1 implementation of 
	 * an Interleaved 2 of 5 bar code to encode a Global Trade Item Number. 
	 * ITF-14 symbols are generally used on packaging levels of a product, 
	 * such as a case box of 24 cans of soup. 
	 * The ITF-14 will always encode 14 digits.
	 * 
	 * The last digit of an ITF-14 barcode is an checksum. 
	 * It is normally included but JsBarcode can automatically 
	 * calculate it for you if it is left out.
	 */
	const ITF14 = "ITF14";

	/** 
	 * MSI or Modified Plessey is a barcode developed by the MSI Data Corporation 
	 * and is primarily used for inventory control, marking storage containers 
	 * and shelves in warehouse environments. It supports digits 0-9. 
	 * JsBarcode provides automatic checksum 
	 * calculation of Mod 10, Mod 11, Mod 1010 and Mod 1110.
	 */
	const MSI     = "MSI";
	const MSI10   = "MSI10";
	const MSI11   = "MSI11";
	const MSI1010 = "MSI1010";
	const MSI1110 = "MSI1110";

	/** 
	 * Pharmacode is a barcode used in the pharmaceutical industry. 
	 * It can encode numbers 3 to 131070.
	 */
	const PHARMACODE = "pharmacode";

	/** 
	 * Codabar is an old barcode type that can encode numbers 
	 * and a number of special characters (–, $, :, /, +, .).
	 * 
	 * You can set start and stop characters to A, B, C or D 
	 * but if no start and stop character is defined A will be used.
	 */
	const CODABAR = "codabar";

	/**
	 * @var string
	 */
	public $value;

	/**
	 * @var string
	 */
	public $format;

	/**
	 * @var string default `self::CODE128`
	 */
	public $defaultFormat = self::CODE128;

	/**
	 * @var array default `[]`, Custom Barcode Canvas options and override default options
	 */
	public $options = [];

	/**
	 * @var array default `[]`, for option `JsBarcode(#options['id'], value, pluginOptions);`
	 * @see https://github.com/lindell/JsBarcode/wiki/Options
	 * 
	 * ```php
	 * 'pluginOptions' => [
	 *     'format'       => "auto"
	 *     'width'        => 2
	 *     'height'       => 100
	 *     'displayValue' => true
	 *     'text'         => undefined
	 *     'fontOptions'  => ""
	 *     'font'         => "monospace"
	 *     'textAlign'    => "center"
	 *     'textPosition' => "bottom"
	 *     'textMargin'   => 2
	 *     'fontSize'     => 20
	 *     'background'   => "#ffffff"
	 *     'lineColor'    => "#000000"
	 *     'margin'       => 10
	 *     'marginTop'    => undefined
	 *     'marginBottom' => undefined
	 *     'marginLeft'   => undefined
	 *     'marginRight'  => undefined
	 *     'flat'         => false
	 *     'valid'        => function(valid){}
	 * ],
	 * ```
	 */
	public $pluginOptions = [];

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		$this->view->registerAssetBundle(BarcodeAsset::class);

		$this->pluginOptions['format'] = $this->format ?? ArrayHelper::getValue($this->pluginOptions, 'format', $this->defaultFormat);
		$this->pluginOptions['format'] = strtolower($this->pluginOptions['format']) === 'auto' ? $this->defaultFormat : $this->pluginOptions['format'];

		if (!isset($this->options['id'])) {
			$this->options['id'] = $this->getId();
		}

		parent::init();
	}

	/**
	 * @inheritdoc
	 */
	public function run()
	{
		$pluginOptions = Json::encode($this->pluginOptions);

		$this->view->registerJs("JsBarcode(\"#{$this->options['id']}\", \"{$this->value}\", {$pluginOptions});");

		return Html::tag('svg', '', $this->options);
	}
}
