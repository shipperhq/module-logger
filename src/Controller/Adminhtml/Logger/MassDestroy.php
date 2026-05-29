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

class MassDestroy extends \ShipperHQ\Logger\Controller\Adminhtml\Logger
{
    /**
     * @return void
     */
    public function execute()
    {
        try {
            $model = $this->_objectManager->create('ShipperHQ\Logger\Model\Log');
            $model->truncate();

            $this->messageManager->addSuccess(
                __('All logs have been removed.')
            );
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            $this->messageManager->addError($e->getMessage());
        } catch (\Exception $e) {
            $this->messageManager->addException(
                $e,
                __("An error occurred while destroying messages.")
            );
        }

        $this->_redirect('shqlogger/*/index');
    }
}
