<?php
/**
 * ShipperHQ
 *
 * @category ShipperHQ
 * @package ShipperHQ\Logger
 * @copyright Copyright (c) 2019 Zowta LTD and Zowta LLC (http://www.ShipperHQ.com)
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @author ShipperHQ Team sales@shipperhq.com
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
        $this->setData([]);
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
    public function parse($severity, $extension, $title, $description, $code = 0, $url = '')
    {
        if (is_array($description) || is_object($description)) {
            $description = print_r($description, true);
        }

        $feedData[] = [
            'severity'      => $severity,
            'date_added'    => gmdate('Y-m-d H:i:s'),
            'extension'     => $extension,
            'title'         => $title,
            'description'   => $description,
            'code'          => $code,
            'url'           => $url
        ];

        return $this->getResource()->parse($this, $feedData);
    }

    public function truncate()
    {
        return $this->getResource()->truncate();
    }
}
