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

namespace ShipperHQ\Logger\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

class Logger extends Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'shqlogger';
        $this->_blockGroup = 'ShipperHQ_Logger';
        $this->_headerText = __('ShipperHQ Logs');
        parent::_construct();

        $this->buttonList->remove('add');
    }
}
