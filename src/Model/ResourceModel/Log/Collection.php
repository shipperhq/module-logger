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

namespace ShipperHQ\Logger\Model\ResourceModel\Log;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    protected $_storeId = 0;

    /**
     *  Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init('ShipperHQ\Logger\Model\Log', 'ShipperHQ\Logger\Model\ResourceModel\Log');
    }

    /**
     * Filter results
     *
     * @param bool $printQuery
     * @param bool $logQuery
     * @return $this
     */
    public function load($printQuery = false, $logQuery = false)
    {
        if ($this->isLoaded()) {
            return $this;
        }
        $this->addRemoveFilter();
        return parent::load($printQuery, $logQuery);
    }

    public function addRemoveFilter()
    {
        $this->addFieldToFilter('is_remove', 0);
        return $this;
    }
}
