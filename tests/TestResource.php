<?php
/**
 * Created by PhpStorm.
 * @author Tareq Mahmood <tareqtms@yahoo.com>
 * Created at: 9/9/16 12:28 PM UTC+06:00
 */

namespace PHPShopify;

use PHPUnit\Framework\TestCase;

class TestResource extends TestCase
{
    /**
     * @var ShopifySDK $shopify;
     */
    public static $shopify;

    /**
     * @inheritDoc
     */
    public static function setUpBeforeClass(): void
    {
        $config = array(
            'ShopUrl' => getenv('SHOPIFY_SHOP_URL'), //Your shop URL
            'ApiKey' => getenv('SHOPIFY_API_KEY'), //Your Private API Key
            'Password' => getenv('SHOPIFY_API_PASSWORD'), //Your Private API Password
            'AccessToken' => getenv('SHOPIFY_ACCESS_TOKEN'), //Your Access Token(Private API Password)
        );

        self::$shopify = new ShopifySDK($config);
        self::$shopify->checkApiCallLimit();
    }

    /**
     * @inheritDoc
     */
    public static function tearDownAfterClass(): void
    {
        self::$shopify = null;
    }
}