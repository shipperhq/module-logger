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

namespace ShipperHQ\Logger\Model\ResourceModel;

class Log extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Define main table
     */
    protected function _construct()
    {
        $this->_init('shqlogger_log', 'notification_id');
    }

    public function loadLatestNotice(\ShipperHQ\Logger\Model\Log $object)
    {
        $connection = $this->getConnection();
        $select = $connection->select()
            ->from($this->getMainTable())
            ->order($this->getIdFieldName() . ' desc')
            ->where('is_read <> 1')
            ->where('is_remove <> 1')
            ->limit(1);
        $data = $connection->fetchRow($select);

        if ($data) {
            $object->setData($data);
        }

        $this->_afterLoad($object);

        return $this;
    }

    public function getNoticeStatus(\ShipperHQ\Logger\Model\Log $object)
    {
        $connection = $this->getConnection();
        $select = $connection->select()
            ->from($this->getMainTable(), [
                'severity'     => 'severity',
                'count_notice' => 'COUNT(' . $this->getIdFieldName() . ')'])
            ->group('severity')
            ->where('is_remove=?', 0)
            ->where('is_read=?', 0);
        $return = [];
        $rowSet = $connection->fetchAll($select);
        foreach ($rowSet as $row) {
            $return[$row['severity']] = $row['count_notice'];
        }
        return $return;
    }

    public function parse(\ShipperHQ\Logger\Model\Log $object, array $data)
    {
        $connection = $this->getConnection();
        foreach ($data as $item) {
            $connection->insert($this->getMainTable(), $item);
        }
    }

    public function truncate()
    {
        $connection = $this->getConnection();
        try {
            $connection->truncateTable($this->getMainTable());
        } catch (\Exception $e) {
            //TODO
          //  Mage::logException("ShipperHQ Logger Exception");
          //  Mage::logException($e);
        }
    }
}
