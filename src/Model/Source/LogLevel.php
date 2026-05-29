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

namespace ShipperHQ\Logger\Model\Source;

use ShipperHQ\Logger\Model\Source\Generic as Generic;

/**
 * Class LogLevel
 *
 * Used to return the log levels from Monolog
 *
 * @package ShipperHQ\Logger
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
