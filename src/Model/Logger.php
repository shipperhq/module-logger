<?php
/* ExtName
 *
 * User        karen
 * Date        8/9/15
 * Time        2:02 PM
 * @category   Webshopapps
 * @package    Webshopapps_Logger
 * @copyright   Copyright (c) 2015 Zowta Ltd (http://www.WebShopApps.com)
 *              Copyright, 2015, Zowta, LLC - US license
 * @license    http://www.webshopapps.com/license/license.txt - Commercial license
 */

namespace WebShopApps\Logger\Model;

use WebShopApps\Logger\Helper\Config;


/**
 * WSA Logger implementation
 * @SuppressWarnings(PHPMD.ExcessiveClassComplexity)
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Logger extends  \Magento\Framework\Model\AbstractModel
{
    /**
     * @var Config
     */
    protected $configHelper;

    /**
     * @param Config $configHelper
     */
    public function __construct(Config $configHelper) {
         $this->$configHelper = $configHelper;
    }



}