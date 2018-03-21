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

use \Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * ShipperHQ Logger implementation
 * @SuppressWarnings(PHPMD.ExcessiveClassComplexity)
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Logger extends \Monolog\Logger
{
    const SEVERITY_CRITICAL = 1;
    const SEVERITY_MAJOR    = 2;
    const SEVERITY_MINOR    = 3;
    const SEVERITY_NOTICE   = 4;
    const SEVERITY_NONE     = -1;

    /**
     * @var  \Magento\Framework\App\Config\ScopeConfigInterface
     */
    private $scopeConfig;
    /**
     * @var \ShipperHQ\Shipper\Model\SynchronizeFactory
     */
    private $logFactory;

    /**
     * @param LogFactory         $logFactory
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param string             $name       The logging channel
     * @param HandlerInterface[] $handlers   Optional stack of handlers, the first one in the array is called first, etc.
     * @param callable[]         $processors Optional array of processors
     */
    public function __construct(
        LogFactory $logFactory,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        $name,
        array $handlers = [],
        array $processors = []
    ) {

        $this->logFactory = $logFactory;
        $this->scopeConfig = $scopeConfig;
        parent::__construct($name, $handlers, $processors);
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
    public function debug($message, array $context = [])
    {
        if (!$this->scopeConfig->getValue('shqlogmenu/shqlogger/active')) {
            return false;
        }

        return $this->logMessage($message, $context, self::SEVERITY_NOTICE);
    }

    /**
     * Adds a log record at the INFO level.
     *
     * This method allows for compatibility with common interfaces.
     *
     * @param  string  $message The log message
     * @param  array   $context The log context
     * @return Boolean Whether the record has been processed
     */
    public function info($message, array $context = [])
    {
        if (!$this->scopeConfig->getValue('shqlogmenu/shqlogger/active')) {
            return false;
        }

        return $this->logMessage($message, $context, self::SEVERITY_MINOR);
    }

    /**
     * Adds a log record at the WARNING level.
     *
     * This method allows for compatibility with common interfaces.
     *
     * @param  string  $message The log message
     * @param  array   $context The log context
     * @return Boolean Whether the record has been processed
     */
    public function warning($message, array $context = [])
    {
        if (!$this->scopeConfig->getValue('shqlogmenu/shqlogger/active')) {
            return false;
        }

        return $this->logMessage($message, $context, self::SEVERITY_MAJOR);
    }

    /**
     * Adds a log record at the CRITICAL level.
     *
     * This method allows for compatibility with common interfaces.
     *
     * @param  string  $message The log message
     * @param  array   $context The log context
     * @return Boolean Whether the record has been processed
     */
    public function critical($message, array $context = [])
    {
        if (!$this->scopeConfig->getValue('shqlogmenu/shqlogger/active')) {
            return false;
        }
        return $this->logMessage($message, $context, self::SEVERITY_CRITICAL);
    }


    protected function logMessage($message, array $context = [], $severity)
    {
        $adminLevel = $this->scopeConfig->getValue('shqlogmenu/shqlogger/admin_level');
        $systemLogLevel = $this->scopeConfig->getValue('shqlogmenu/shqlogger/system_level');
        $emailLevel = $this->scopeConfig->getValue('shqlogmenu/shqlogger/email_level');

        if ($adminLevel>0 && $adminLevel >= $severity) {
            $this->logAdmin($message, $context, $severity);
        }

        if ($systemLogLevel > 0 && $systemLogLevel >= $severity) {
            $message = is_string($message) ? $message : var_export($message, true);
            switch ($severity) {
                case self::SEVERITY_NOTICE:
                    parent::debug($message, $context);
                    break;
                case self::SEVERITY_MINOR:
                    parent::notice($message, $context);
                    break;
                case self::SEVERITY_MAJOR:
                    parent::warning($message, $context);
                    break;
                case self::SEVERITY_CRITICAL:
                    parent::critical($message, $context);
                    break;
            }
        }

        if ($emailLevel>0 && $emailLevel >= $severity) {
            $this->logEmail($message, $context, $severity);
        }
        return true;
    }

    protected function logAdmin($message, array $context = [], $severity)
    {
        if (!is_array($message)) {
            $message = explode('--', $message);
        }
        if (is_array($message) && count($message) > 2) {
            $newLog = $this->logFactory->create();
            $newLog->parse($severity, $message[0], $message[1], $message[2]);
        }
    }

    protected function logEmail($message, array $context = [], $severity)
    {
        //To Do
    }

    protected function isDebug($moduleName)
    {
        $path = 'shqlogmenu/shq_module_log/'.$moduleName;
        parent::debug('the path to config setting ', [$path]);

        return $this->scopeConfig->getValue($path) ? true : false;
    }
}
