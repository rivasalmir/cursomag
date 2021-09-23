<?php
/* File: app/code/Atwix/OrderFeedback/Setup/InstallSchema.php */

namespace Atwix\OrderFeedback\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Class InstallSchema
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * Custom order column
     */
    const ORDER_FEEDBACK_FIELD = 'customer_feedback';

    /**
     * @inheritdoc
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $setup->getConnection()->addColumn(
            $setup->getTable('sales_order'),
            self::ORDER_FEEDBACK_FIELD,
            [
                'type' => Table::TYPE_TEXT,
                'size' => 255,
                'nullable' => true,
                'comment' => 'Customer Feedback'
            ]
        );
        $setup->endSetup();
    }
}