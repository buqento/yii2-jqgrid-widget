<?php
/**
 * @link https://github.com/himiklab/yii2-jqgrid-widget
 * @copyright Copyright (c) 2014 HimikLab
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace himiklab\jqgrid;

use Yii;
use yii\web\AssetBundle;

class JqGridAsset extends AssetBundle
{
    public $sourcePath = '@bower/jqgrid';

    public $css = [
        'css/ui.jqgrid.css'
    ];

    public function init()
    {
        parent::init();
        $jsLangSuffix = $this->getLanguageSuffix();
        if ($jsLangSuffix === 'uk') {
            $jsLangSuffix = 'ua';
        }

        $this->js = [
            'js/minified/jquery.jqGrid.min.js',
            "js/i18n/grid.locale-{$jsLangSuffix}.js"
        ];
    }

    protected function getLanguageSuffix()
    {
        $currentAppLanguage = Yii::$app->language;
        $langsExceptions = ['pt-BR', 'sr-LATIN'];

        if (strpos($currentAppLanguage, '-') === false) {
            return $currentAppLanguage;
        }

        if (in_array($currentAppLanguage, $langsExceptions)) {
            return $currentAppLanguage;
        } else {
            return substr($currentAppLanguage, 0, strpos($currentAppLanguage, '-'));
        }
    }
}
