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

use ShipperHQ\Logger\Helper\Config as Config;

class Generic implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var Config
     */
    protected $loggerConfig;

    /**
     * Carrier code
     *
     * @var string
     */
    protected $code = '';

    /**
     * @param Config $loggerConfig
     */
    public function __construct(Config $loggerConfig)
    {
        $this->loggerConfig = $loggerConfig;
    }

    /**
     * Returns array to be used in multiselect on back-end
     *
     * @return array
     */
    public function toOptionArray()
    {
        $code = $this->code;
        $logConfigIs = $this->loggerConfig;
        $configData = $this->loggerConfig->getCode($this->code);
        $arr = [];
        foreach ($configData as $code => $title) {
            $arr[] = ['value' => $code, 'label' => $title];
        }
        return $arr;
    }
}
