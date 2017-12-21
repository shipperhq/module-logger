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
namespace ShipperHQ\Logger\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use \ShipperHQ\Logger\Model\Logger;

class PostLogObserver implements ObserverInterface
{
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @var \ShipperHQ\Logger\Model\Logger
     */
    private $logger;

    /**
     *
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \ShipperHQ\Logger\Model\Logger $logger
     */
    public function __construct(
        \ShipperHQ\Logger\Model\Logger $logger,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->logger = $logger;
    }

    /**
     * Send type of logging required
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        if (!$this->scopeConfig->getValue(
            'shqlogmenu/shqlogger/active',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        )) {
            return ;
        }

        $adminLevel = $this->scopeConfig->getValue(
            'shqlogmenu/shqlogger/admin_level',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        $systemLogLevel = $this->scopeConfig->getValue(
            'shqlogmenu/shqlogger/system_level',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        $emailLevel = $this->scopeConfig->getValue(
            'shqlogmenu/shqlogger/email_level',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );

        $code           = $observer->getEvent()->getCode();
        $url            = $observer->getEvent()->getUrl();
        $severity       = $observer->getEvent()->getSeverity();
        $title          = $observer->getEvent()->getTitle();
        $extension      = $observer->getEvent()->getExtension();
        $description    = $observer->getEvent()->getDescription();

        if ($adminLevel>0 && $adminLevel>=$severity) {
        //    Mage::getModel('wsalogger/log')->parse($severity,$extension,$title,$description,$code,$url);
        }

        if ($systemLogLevel>0 && $systemLogLevel>=$severity) {
            switch ($severity) {
                case \ShipperHQ\Logger\Helper\Log::SEVERITY_NOTICE:
                    $this->logger->debug(var_export($code.' '.$url.' - '.$extension.' - '.$title, true));
                    if (!is_null($description) && $description!='') {
                        $this->logger->debug(var_export($description, true));
                    }
                    break;
                case \ShipperHQ\Logger\Helper\Log::SEVERITY_MINOR:
                    $this->logger->info(var_export($code.' '.$url.' - '.$extension.' - '.$title, true));
                    if (!is_null($description) && $description!='') {
                        $this->logger->info(var_export($description, true));
                    }
                    break;
                case \ShipperHQ\Logger\Helper\Log::SEVERITY_MAJOR:
                    $this->logger->warning(var_export($code.' '.$url.' - '.$extension.' - '.$title, true));
                    if (!is_null($description) && $description!='') {
                        $this->logger->warning(var_export($description, true));
                    }
                    break;
                case \ShipperHQ\Logger\Helper\Log::SEVERITY_CRITICAL:
                    $this->logger->critical(var_export($code.' '.$url.' - '.$extension.' - '.$title, true));
                    if (!is_null($description) && $description!='') {
                        $this->logger->critical(var_export($description, true));
                    }
                    break;
            }
        }

        if ($emailLevel>0 && $emailLevel>=$severity) {
            /*  * Loads the html file named 'custom_email_template1.html' from
             * app/locale/en_US/template/email/activecodeline_custom_email1.html  */
//            $emailTemplate  = Mage::getModel('core/email_template')
//                ->loadDefault('log_email_template');
//
//            $senderName = Mage::getStoreConfig('wsalogmenu/wsalog/sender_email_name');
//            $senderEmail = Mage::getStoreConfig('wsalogmenu/wsalog/sender_email');
//            $subject = Mage::getStoreConfig('wsalogmenu/wsalog/email_subject');
//
//            if(!empty($senderEmail) && !empty($senderName) && !empty($subject)) {
//
//                $emailTemplate->setSenderName($senderName);
//                $emailTemplate->setSenderEmail($senderEmail);
//                $emailTemplate->setTemplateSubject($subject);
//
//                if (is_array($description) || is_object($description)) {
//                    $description = print_r($description, true);
//                }
//                $description = htmlentities($description);
//
//                //Create an array of variables to assign to template
//                //TODO add severity
//                $emailTemplateVariables 				= array();
//                $emailTemplateVariables['title'] 		= $title;
//                $emailTemplateVariables['severity'] 	= $severity;
//                $emailTemplateVariables['extension'] 	= $extension;
//                $emailTemplateVariables['description'] 	= $description;
//                $emailTemplateVariables['code'] 		= $code;
//                $emailTemplateVariables['url']		 	= $url;
//
//                $processedTemplate = $emailTemplate->getProcessedTemplate($emailTemplateVariables);
//                /*  * Or you can send the email directly,  * note getProcessedTemplate is called inside send()  */
//
//                $emailTemplate->send(Mage::getStoreConfig('wsalogmenu/wsalog/contact_email'),'', $emailTemplateVariables);
//            } else {
//                Mage::log("ShipperHQ Logger - Email Log Can Not Be Sent. Email Address/Subject/Name Not Entered in Config");
//            }
        }
    }
}
