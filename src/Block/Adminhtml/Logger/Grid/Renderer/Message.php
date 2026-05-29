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

namespace ShipperHQ\Logger\Block\Adminhtml\Logger\Grid\Renderer;

class Message extends \Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer
{
    /**
     * @var \Magento\Framework\Url\Helper\Data
     */
//    protected $_urlHelper;

    /**
     * @param \Magento\Backend\Block\Context $context
     * @param \Magento\Framework\Url\Helper\Data $urlHelper
     * @param array $data
     */
//    public function __construct(
//        \Magento\Backend\Block\Context $context,
//        \Magento\Framework\Url\Helper\Data $urlHelper,
//        array $data = []
//    ) {
//        $this->_urlHelper = $urlHelper;
//        parent::__construct($context, $data);
//    }

    /**
     * Renders grid column
     *
     * @param   \Magento\Framework\DataObject $row
     * @return  string
     */
    public function render(\Magento\Framework\DataObject $row)
    {
        $dots = '';
        if (strlen($row->getDescription())>512) {
            $dots = ' . . . ';
        }
        return '<span class="grid-row-title">' . $row->getTitle() . '</span>'
        . ($row->getDescription() ? '<br />' . substr($row->getDescription(), 0, 512) . $dots : '');
    }
}
