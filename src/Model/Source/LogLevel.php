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

namespace ShipperHQ\Logger\Model\Source;

use ShipperHQ\Logger\Model\Source\Generic as Generic;

/**
 * Class LogLevel
 *
 * Used to return the log levels from Monolog
 *
 * @package ShipperHQ\Logger\Model\System\Config\Source
 */
class LogLevel extends Generic
{
    /**
     * Carrier code
     *
     * @var string
     */
    protected $code = 'logLevel';
}
