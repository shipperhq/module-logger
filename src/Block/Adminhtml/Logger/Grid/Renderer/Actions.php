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
namespace ShipperHQ\Logger\Block\Adminhtml\Logger\Grid\Renderer;

class Actions extends \Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer
{
    /**
     * @var \Magento\Framework\Url\Helper\Data
     */
    protected $_urlHelper;

    /**
     * @param \Magento\Backend\Block\Context $context
     * @param \Magento\Framework\Url\Helper\Data $urlHelper
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Context $context,
        \Magento\Framework\Url\Helper\Data $urlHelper,
        array $data = []
    ) {
        $this->_urlHelper = $urlHelper;
        parent::__construct($context, $data);
    }

    /**
     * Renders grid column
     *
     * @param   \Magento\Framework\DataObject $row
     * @return  string
     */
    public function render(\Magento\Framework\DataObject $row)
    {
        $encodedUrl = $this->_urlHelper->getEncodedUrl();
        if (!$row->getIsRead()) {
            return sprintf(
                '<a href="%s">%s</a> | <a href="%s" onClick="deleteConfirm(\'%s\',this.href); return false;">%s</a>',
                $this->getUrl(
                    '*/*/markAsRead/',
                    ['_current' => true, 'id' => $row->getId()]
                ),
                __('Mark as Read'),
                $this->getUrl(
                    '*/*/remove/',
                    [
                        '_current' => true,
                        'id' => $row->getId(),
                        \Magento\Framework\App\ActionInterface::PARAM_NAME_URL_ENCODED => $encodedUrl
                    ]
                ),
                __('Are you sure?'),
                __('Remove')
            );
        } else {
            return sprintf(
                '<a href="%s" onClick="deleteConfirm(\'%s\',this.href); return false;">%s</a>',
                $this->getUrl(
                    '*/*/remove/',
                    [
                        '_current' => true,
                        'id' => $row->getId(),
                        \Magento\Framework\App\ActionInterface::PARAM_NAME_URL_ENCODED => $encodedUrl
                    ]
                ),
                __('Are you sure?'),
                __('Remove')
            );
        }
        return parent::render($row);
    }
}
