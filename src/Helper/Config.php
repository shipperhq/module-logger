<?php
/* ExtName
 *
 * User        karen
 * Date        8/9/15
 * Time        2:31 PM
 * @category   Webshopapps
 * @package    Webshopapps_ExtnName
 * @copyright   Copyright (c) 2014 Zowta Ltd (http://www.WebShopApps.com)
 *              Copyright, 2014, Zowta, LLC - US license
 * @license    http://www.webshopapps.com/license/license.txt - Commercial license
 */

namespace WebShopApps\Logger\Helper;

use WebShopApps\Common\Model\ConfigInterface;
use WebShopApps\Common\Helper\AbstractConfig;
use Psr\Log\LogLevel;



/**
 * Class Config
 */
class Config extends AbstractConfig implements ConfigInterface
{


    /**
     * Get configuration data of carrier
     *
     * @return array
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function getCodes()
    {
        return [
            'logLevel' => [
                LogLevel::EMERGENCY      => __(LogLevel::EMERGENCY),
                LogLevel::ALERT          => __(LogLevel::ALERT),
                LogLevel::CRITICAL       => __(LogLevel::CRITICAL),
                LogLevel::ERROR          => __(LogLevel::ERROR),
                LogLevel::WARNING        => __(LogLevel::WARNING),
                LogLevel::NOTICE         => __(LogLevel::NOTICE),
                LogLevel::INFO           => __(LogLevel::INFO),
                LogLevel::DEBUG          => __(LogLevel::DEBUG),
            ],
        ];
    }
}
