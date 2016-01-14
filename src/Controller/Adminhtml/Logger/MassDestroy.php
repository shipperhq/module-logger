<?php
/**
 * WebShopApps
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
 * WebShopApps Logger
 *
 * @category WebShopApps
 * @package WebShopApps_Logger
 * @copyright Copyright (c) 2015 Zowta LLC (http://www.WebShopApps.com)
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @author WebShopApps Team sales@webshopapps.com
 *
 */
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace WebShopApps\Logger\Controller\Adminhtml\Logger;

class MassDestroy extends \WebShopApps\Logger\Controller\Adminhtml\Logger
{
    /**
     * @return void
     */
    public function execute()
    {
        try {
            $model = $this->_objectManager->create('WebShopApps\Logger\Model\Log');
            $model->truncate();

            $this->messageManager->addSuccess(
                __('All logs have been removed.')
            );
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            $this->messageManager->addError($e->getMessage());
        } catch (\Exception $e) {
            $this->messageManager->addException(
                $e,
                __("An error occurred while destroying messages.")
            );
        }

        $this->_redirect('adminhtml/*/');
    }

}
