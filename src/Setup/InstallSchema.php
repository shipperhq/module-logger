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
namespace ShipperHQ\Logger\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if (!$installer->getConnection()->isTableExists($installer->getTable('shqlogger_log'))) {
            $table = $installer->getConnection()->newTable($installer->getTable('shqlogger_log'));
            $table
                ->addColumn(
                    'notification_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    10,
                    ['primary' => true,
                        'nullable' => false,
                        'unsigned' => true,
                        'auto_increment' => true ],
                    'Notification ID'
                )->addColumn(
                    'severity',
                    \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                    3,
                    ['nullable' => false,
                    'unsigned' => true,
                    'default' => 0],
                    'Severity'
                )->addColumn(
                    'date_added',
                    \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
                    null,
                    ['nullable' => false],
                    'Date added'
                )->addColumn(
                    'extension',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    null,
                    ['nullable' => false],
                    'Extension'
                )->addColumn(
                    'title',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    null,
                    ['nullable' => false],
                    'Log title'
                )->addColumn(
                    'description',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    null,
                    ['nullable' => true],
                    'Log description'
                )->addColumn(
                    'code',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    null,
                    ['nullable' => true],
                    'Code'
                )->addColumn(
                    'url',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    null,
                    ['nullable' => true],
                    'URL'
                )->addColumn(
                    'is_read',
                    \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                    1,
                    ['nullable' => false,
                        'unsigned' => true,
                        'default' => 0],
                    'Has been read'
                )->addColumn(
                    'is_remove',
                    \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                    1,
                    ['nullable' => false,
                        'unsigned' => true,
                        'default' => 0],
                    'To be removed'
                )->addIndex(
                    $installer->getIdxName('shqlogger_log', ['severity']),
                    ['severity']
                )->addIndex(
                    $installer->getIdxName('shqlogger_log', ['is_read']),
                    ['is_read']
                )->addIndex(
                    $installer->getIdxName('shqlogger_log', ['is_remove']),
                    ['is_remove']
                )->setComment(
                    'ShipperHQ Logger data table'
                );

            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}
