<?php
/**
 *
 * ShipperHQ
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * Shipper HQ Shipping
 *
 * @category ShipperHQ
 * @package ShipperHQ_Logger
 * @copyright Copyright (c) 2015 Zowta LLC (http://www.ShipperHQ.com)
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @author ShipperHQ Team sales@shipperhq.com
 */
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace ShipperHQ\Logger\Model;

use Magento\Framework\Model\AbstractModel;

class Log extends AbstractModel
{
    /**
     * Define resource model
     */
    protected function _construct()
    {
        $this->_init('ShipperHQ\Logger\Model\ResourceModel\Log');
    }

    /**
     * Retrieve Latest Notice
     *
     * @return \ShipperHQ\Logger\Model\Log
     */
    public function loadLatestNotice()
    {
        $this->setData(array());
        $this->getResource()->loadLatestNotice($this);
        return $this;
    }

    /**
     * Retrieve notice statuses
     *
     * @return array
     */
    public function getNoticeStatus()
    {
        return $this->getResource()->getNoticeStatus($this);
    }

    /**
     * Parse and save new data
     *
     * @param array $data
     * @return \ShipperHQ\Logger\Model\Log
     */
    public function parse($severity,$extension,$title,$description,$code=0,$url='')
    {
        if (is_array($description) || is_object($description)) {
            $description = print_r($description, true);
        }

        $feedData[] = array(
            'severity'      => $severity,
            'date_added'    => gmdate('Y-m-d H:i:s'),
            'extension'     => $extension,
            'title'         => $title,
            'description'   => $description,
            'code'			=> $code,
            'url'			=> $url
        );

        return $this->getResource()->parse($this, $feedData);
    }

    public function truncate()
    {
        return $this->getResource()->truncate();
    }

}