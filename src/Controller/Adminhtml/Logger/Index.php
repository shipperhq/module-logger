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

class Index extends \ShipperHQ\Logger\Controller\Adminhtml\Logger
{
    /**
     * Index Action for Synchronize
     * @return Void
     * */

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu(
            'ShipperHQ_Logger::logger'
        );
        $resultPage->getConfig()->getTitle()->prepend(__('ShipperHQ Logs'));
        $resultPage->addBreadcrumb(__('ShipperHQ Logs'), __('ShipperHQ Logs'));
        return $resultPage;
    }
}
