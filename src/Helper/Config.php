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

namespace ShipperHQ\Logger\Helper;

use Psr\Log\LogLevel;

/**
 * Class Config
 */
class Config
{
    const SEVERITY_CRITICAL = 1;
    const SEVERITY_MAJOR    = 2;
    const SEVERITY_MINOR    = 3;
    const SEVERITY_NOTICE   = 4;
    const SEVERITY_NONE     = -1;

    /**
     * Get configuration data of carrier
     *
     * @return array
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function getCodes()
    {
        return [
            'logLevel'   =>[
                self::SEVERITY_CRITICAL => __('critical'),
                self::SEVERITY_MAJOR    => __('warning'),
                self::SEVERITY_MINOR    => __('info'),
                self::SEVERITY_NOTICE   => __('debug'),
                self::SEVERITY_NONE     => __('DISABLED')
            ],
        ];
    }

    /**
     * Get configuration data of carrier
     *
     * @param string $type
     * @param string $code
     * @return array|string|false
     */
    public function getCode($type, $code = '')
    {
        $codes = $this->getCodes();
        if (!isset($codes[$type])) {
            return false;
        } elseif ('' === $code) {
            return $codes[$type];
        }

        if (!isset($codes[$type][$code])) {
            return false;
        } else {
            return $codes[$type][$code];
        }
    }
}
