<?php

namespace app\Widjets\currency;

class Currency
{
    protected $template;
    protected $currencies;
    protected $currency;

    public function __construct()
    {
        $this->template = __DIR__ . '/currency_tpl/currency.php';
        $this->run();
    }

    protected function run()
    {
        $this->getHtml();
    }

    public static function getCurrencies()
    {
        return \R::getAssoc("SELECT code, title, symbol_left, symbol_right, value, base FROM currency ORDER BY base DESC");
    }

    public static function getCurrency($currencies)
    {
        if(isset($_COOKIE['currency']) && array_key_exists($_COOKIE['currency'], $currencies))
        {
            $key = $_COOKIE['currency'];
        } else {
            $key = key($currencies);
        }
        $currency = $currencies[$key];
        $currency['code'] = $key;
        return $currency;
    }

    protected function getHtml()
    {
        //
    }


}