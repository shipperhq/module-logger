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

class Remove extends \ShipperHQ\Logger\Controller\Adminhtml\Logger
{
    /**
     * @return void
     */
    public function execute()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            $model = $this->_objectManager->create('ShipperHQ\Logger\Model\Log')->load($id);

            if (!$model->getId()) {
                $this->_redirect('shqlogger/*/index');
                return;
            }

            try {
                $model->setIsRemove(1)->save();
                $this->messageManager->addSuccess(__('The message has been removed.'));
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __("An error occurred while removing log."));
            }

            $this->_redirect('shqlogger/*/index');
            return;
        }
        $this->_redirect('shqlogger/*/index');
    }
}
