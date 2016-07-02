<?php
/**
 * *
 *  * Copyright © Elias Kotlyar - All rights reserved.
 *  * See LICENSE.md bundled with this module for license details.
 *
 */
namespace FireGento\FastSimpleImport2Demo\Console\Command\Category;

use FireGento\FastSimpleImport2Demo\Console\Command\AbstractImportCommand;
use Magento\ImportExport\Model\Import;

/**
 * Class TestCommand
 * @package FireGento\FastSimpleImport2\Console\Command
 *
 */
class ImportCategory extends AbstractImportCommand
{


    protected function configure()
    {
        $this->setName('fastsimpleimport2demo:category:import')
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
            '_category' => 'Test2',
            'description' => 'Test2',
            'is_active' => 'yes',
            'include_in_menu' => 'yes',
            'meta_description' => 'Meta Test',
            'available_sort_by' => 'position',
            'default_sort_by' => 'position',
        );
        return $data;
    }
}



