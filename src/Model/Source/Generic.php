<?php
/* ExtName
 *
 * User        karen
 * Date        8/9/15
 * Time        2:01 PM
 * @category   Webshopapps
 * @package    Webshopapps_ExtnName
 * @copyright   Copyright (c) 2014 Zowta Ltd (http://www.WebShopApps.com)
 *              Copyright, 2014, Zowta, LLC - US license
 * @license    http://www.webshopapps.com/license/license.txt - Commercial license
 */
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace WebShopApps\Logger\Model\Source;

use WebShopApps\Logger\Helper\Config;

class Generic implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var Config
     */
    protected $loggerConfig;

    /**
     * Carrier code
     *
     * @var string
     */
    protected $code = '';

    /**
     * @param Config $loggerConfig
     */
    public function __construct(Config $loggerConfig)
    {
        $this->loggerConfig = $loggerConfig;
    }

    /**
     * Returns array to be used in multiselect on back-end
     *
     * @return array
     */
    public function toOptionArray()
    {
        $configData = $this->loggerConfig->getCode($this->code);
        $arr = [];
        foreach ($configData as $code => $title) {
            $arr[] = ['value' => $code, 'label' => $title];
        }
        return $arr;
    }
}
