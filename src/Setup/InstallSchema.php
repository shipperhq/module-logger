<?php
/* ExtName
 *
 * User        karen
 * Date        8/9/15
 * Time        2:02 PM
 * @category   Webshopapps
 * @package    Webshopapps_Logger
 * @copyright   Copyright (c) 2015 Zowta Ltd (http://www.WebShopApps.com)
 *              Copyright, 2015, Zowta, LLC - US license
 * @license    http://www.webshopapps.com/license/license.txt - Commercial license
 */
namespace WebShopApps\Logger\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if (!$installer->getConnection()->isTableExists($installer->getTable('wsalogger_log'))) {
            $table = $installer->getConnection()->newTable($installer->getTable('wsalogger_log'));
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
                    $installer->getIdxName('wsalogger_log', ['severity']),
                    ['severity']
                )->addIndex(
                    $installer->getIdxName('wsalogger_log', ['is_read']),
                    ['is_read']
                )->addIndex(
                    $installer->getIdxName('wsalogger_log', ['is_remove']),
                    ['is_remove']
                )->setComment(
                    'WebShopApps Logger data table'
                );

            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}
