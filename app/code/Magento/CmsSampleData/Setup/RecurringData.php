<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\CmsSampleData\Setup;

use Magento\Framework\App\State;
use Magento\Framework\Indexer\IndexerInterfaceFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * Recurring data install.
 */
class RecurringData implements InstallDataInterface
{
    /**
     * @var \Magento\CmsSampleData\Model\Page
     */
    private $page;

    /**
     * @var \Magento\CmsSampleData\Model\Block
     */
    private $block;

    /**
     * Init
     *
     * @param \Magento\CmsSampleData\Model\Page $page
     * @param \Magento\CmsSampleData\Model\Block $block
     */
    public function __construct(
        \Magento\CmsSampleData\Model\Page $page,
        \Magento\CmsSampleData\Model\Block $block
    ) {
        $this->page = $page;
        $this->block = $block;
    }

    /**
     * {@inheritdoc}
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $this->page->installPB(['Magento_CmsSampleData::fixtures/pages/pagebuilder_pages.csv'], 10000);
        $this->block->installPB(['Magento_CmsSampleData::fixtures/blocks/pagebuilder_blocks.csv'], 10000);
    }
}
