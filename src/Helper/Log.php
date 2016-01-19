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

namespace ShipperHQ\Logger\Helper;

use Magento\Framework\Event\ManagerInterface;
use ShipperHQ\Common\Model\ConfigInterface;
use ShipperHQ\Common\Helper\Data;
use Psr\Log\LogLevel;

/**
 * Class Config
 */
class Log extends \Magento\Framework\App\Helper\AbstractHelper
{

    const SEVERITY_CRITICAL = 1;
    const SEVERITY_MAJOR    = 2;
    const SEVERITY_MINOR    = 3;
    const SEVERITY_NOTICE   = 4;
    const SEVERITY_NONE     = -1;

    /**
     * @var \ShipperHQ\Logger\Model\Logger
     */
    private $logger;

    /**
     * @var Data
     */
    private $helper;
    /*
     * @var \Magento\Framework\Event\ManagerInterface
     */
    private $eventManager;


    public function __construct(
        \Magento\Framework\Event\ManagerInterface $eventManager,
        \ShipperHQ\Common\Helper\Data $dataHelper,
        \ShipperHQ\Logger\Model\Logger $logger
    ) {
        $this->logger = $logger;
        $this->helper = $dataHelper;
        $this->eventManager = $eventManager;
    }


    /**
     * @param string $extension
     * @param string $title
     * @param string $description
     * @param bool $debug
     * @param int $code
     * @param string $url
     */
    public function postDebug($extension,$title,$description,$debug=true,$code=0,$url='')
    {
        $this->postLog(self::SEVERITY_NOTICE, $extension,$title,$description,$debug=true,$code=0,$url='');
    }

    /**
     * @param string $extension
     * @param string $title
     * @param string $description
     * @param bool $debug
     * @param int $code
     * @param string $url
     */
    public function postInfo($extension,$title,$description,$debug=true,$code=0,$url='')
    {
        $this->postLog(self::SEVERITY_MINOR, $extension,$title,$description,$debug=true,$code=0,$url='');
    }

    /**
     * @param string $extension
     * @param string $title
     * @param string $description
     * @param bool $debug
     * @param int $code
     * @param string $url
     */
    public function postWarning($extension,$title,$description,$debug=true,$code=0,$url='')
    {
        $this->postLog(self::SEVERITY_MAJOR, $extension,$title,$description,$debug=true,$code=0,$url='');
    }

    /**
     * @param string $extension
     * @param string $title
     * @param string $description
     * @param bool $debug
     * @param int $code
     * @param string $url
     */
    public function postCritical($extension,$title,$description,$debug=true,$code=0,$url='')
    {
        $this->postLog(self::SEVERITY_CRITICAL, $extension,$title,$description,$debug=true,$code=0,$url='');
    }

    protected function postLog($severity,$extension,$title,$description,$debug,$code,$url)
    {
        if (!$this->helper->getConfigValue('shqlogmenu/shqlogger/active') || !$debug) {
            return ;
        }

        $this->eventManager->dispatch(
            'shqlogger_log_mesasge',
            ['severity'=>$severity,
                'title' => $title,
                'extension' => $extension,
                'description' => $description,
                'code'			=> $code,
                'url'			=> $url]
        );
    }

}
