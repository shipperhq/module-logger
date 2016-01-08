<?php
/* ExtName
 *
 * User        karen
 * Date        8/9/15
 * Time        1:57 PM
 * @category   Webshopapps
 * @package    Webshopapps_Logger
 * @copyright   Copyright (c) 2015 Zowta Ltd (http://www.WebShopApps.com)
 *              Copyright, 2015, Zowta, LLC - US license
 * @license    http://www.webshopapps.com/license/license.txt - Commercial license
 */

namespace WebShopApps\Logger\Model\Source;

use WebShopApps\Logger\Model\Source\Generic as Generic;

/**
 * Class LogLevel
 *
 * Used to return the log levels from Monolog
 *
 * @package WebShopApps\Logger\Model\System\Config\Source
 */
class LogLevel extends Generic
{
    /**
     * Carrier code
     *
     * @var string
     */
    protected $code = 'logLevel';

}