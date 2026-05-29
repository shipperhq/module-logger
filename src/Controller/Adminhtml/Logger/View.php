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

namespace ShipperHQ\Logger\Controller\Adminhtml\Logger;

class View extends \ShipperHQ\Logger\Controller\Adminhtml\Logger
{
    /**
     *
     * @return Void
     * */

    public function execute()
    {
        $id = $this->getRequest()->getParam('notification_id');
        $model = $this->_objectManager->create('ShipperHQ\Logger\Model\Log');

        if ($id) {
            $model->load($id);
        }

        $this->_view->loadLayout();
        $this->_view->getLayout()->getBlock('shqlogger_logger_log_view')->setData('log', $model);
        $this->_view->renderLayout();
    }
}
