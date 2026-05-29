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

class MassMarkAsRead extends \ShipperHQ\Logger\Controller\Adminhtml\Logger
{
    /**
     * @return void
     */
    public function execute()
    {
        $ids = $this->getRequest()->getParam('notification');
        if (!is_array($ids)) {
            $this->messageManager->addError(__('Please select logs.'));
        } else {
            try {
                foreach ($ids as $id) {
                    $model = $this->_objectManager->create('ShipperHQ\Logger\Model\Log')->load($id);
                    if ($model->getId()) {
                        $model->setIsRead(1)->save();
                    }
                }
                $this->messageManager->addSuccess(
                    __('A total of %1 record(s) have been marked as read.', count($ids))
                );
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException(
                    $e,
                    __("We couldn't mark the notification as read because of an error.")
                );
            }
        }
        $this->_redirect('shqlogger/*/index');
    }
}
