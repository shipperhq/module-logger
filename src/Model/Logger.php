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


/**
 * ShipperHQ Logger implementation
 * @SuppressWarnings(PHPMD.ExcessiveClassComplexity)
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Logger extends  \Monolog\Logger//\Magento\Framework\Model\AbstractModel
{

    /**
     * @var  \WebShopApps\Common\Helper\Data
     */
    private $helper;
    /*
     * @var \Magento\Framework\Event\ManagerInterface
     */
    private $eventManager;

    /**
     * @param string             $name       The logging channel
     * @param HandlerInterface[] $handlers   Optional stack of handlers, the first one in the array is called first, etc.
     * @param callable[]         $processors Optional array of processors
     */
    public function __construct(\Magento\Framework\Event\ManagerInterface $eventManager,
                                \ShipperHQ\Common\Helper\Data $dataHelper,$name, array $handlers = array(), array $processors = array())
    {
        $this->eventManager = $eventManager;
        $this->helper = $dataHelper;
        parent::__construct($name,$handlers,$processors);

    }

    /**
     * Adds a log record at the DEBUG level.
     *
     * This method allows for compatibility with common interfaces.
     *
     * @param  string  $message The log message
     * @param  array   $context The log context
     * @return Boolean Whether the record has been processed
     */
    public function debug($message, array $context = array())
    {
        if (!$this->helper->getConfigValue('shqlogmenu/shqlogger/active')) {
            return parent::debug($message, $context);
        }

        $this->eventManager->dispatch(
            'shqlogger_log_mesasge',
            ['severity'=>self::DEBUG,
                'title' => $message,
                'extension' => "ShipperHQ",
                'description' => $context,
                'code'			=> '',
                'url'			=> '']
        );

    }

}