<?php
/**
 * *
 *  * Copyright © Elias Kotlyar - All rights reserved.
 *  * See LICENSE.md bundled with this module for license details.
 *
 */
namespace FireGento\FastSimpleImportDemo\Console\Command\Category;

use FireGento\FastSimpleImportDemo\Console\Command\AbstractImportCommand;
use Magento\ImportExport\Model\Import;

/**
 * Class TestCommand
 * @package FireGento\FastSimpleImport2\Console\Command
 *
 */
class ImportCategoryMultiStoreView extends AbstractImportCommand
{


    protected function configure()
    {
        $this->setName('fastsimpleimportdemo:category:import')
            ->setDescription('Import Category');

        $this->setBehavior(Import::BEHAVIOR_APPEND);
        $this->setEntityCode('catalog_category');

        parent::configure();
    }

    /**
     * @return array
     */
    protected function getEntities()
    {
        $data[] = array(
            '_root' => 'Default Category',
            '_category' => 'FireGento TestCategory DE',
            'description' => 'Test2',
            'is_active' => '1',
            'include_in_menu' => '1',
            'meta_description' => 'Meta Test',
            'available_sort_by' => 'position',
            'default_sort_by' => 'position',
            'is_anchor' => '1'
        );
        $data[] = array(
            '_store' => 'en',
            'name' => 'FireGento TestCategory EN',
            'description' => 'StoreViewLevel'
        );
        return $data;
    }
}



