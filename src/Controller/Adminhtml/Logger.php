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
 * @category ShipperHQ
 * @package ShipperHQ_Logger
 * @copyright Copyright (c) 2019 Zowta LTD and Zowta LLC (http://www.ShipperHQ.com)
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @author ShipperHQ Team sales@shipperhq.com
 */

namespace ShipperHQ\Logger\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

abstract class Logger extends Action
{

    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $coreRegistry;

    /**
     * Result page factory
     *
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * Logger factory
     *
     * @var  \ShipperHQ\Logger\Model\LoggerFactory
     */
    protected $loggerFactory;

    /**
     * @param Context $context
     * @param Registry $coreRegistry
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        \ShipperHQ\Logger\Model\LoggerFactory $loggerFactory
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->resultPageFactory = $resultPageFactory;
        $this->loggerFactory = $loggerFactory;
    }

    /**
     * News access rights checking
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('ShipperHQ_Logger::logger');
    }
}
