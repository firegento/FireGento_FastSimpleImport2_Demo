<?php
/**
 * Copyright © 2016 FireGento e.V. - All rights reserved.
 * See LICENSE.md bundled with this module for license details.
 */
namespace FireGento\FastSimpleImportDemo\Console\Command\Product;

use FireGento\FastSimpleImportDemo\Console\Command\AbstractImportCommand;
use Magento\ImportExport\Model\Import;

/**
 * Class TestCommand
 * @package FireGento\FastSimpleImport2\Console\Command
 *
 */
class ImportConfigurable extends AbstractImportCommand
{


    protected function configure()
    {
        $this->setName('fastsimpleimportdemo:products:importconfigurable')
            ->setDescription('Import Configurable Products ');

        $this->setBehavior(Import::BEHAVIOR_APPEND);
        $this->setEntityCode('catalog_product');

        parent::configure();
    }

    /**
     * @return array
     */
    protected function getEntities()
    {
        $products = [];
        $products [] = array(
            'sku' => "SIMPLE-BLUE-SMALL",
            'attribute_set_code' => 'Default',
            'product_type' => 'simple',
            'product_websites' => 'base',
            'name' => 'FireGento Simple Product Blue,Size Small',
            'price' => '1.0000',
            'color' => 'blue',
            'size' => 'S'
        );
        $products [] = array(
            'sku' => "SIMPLE-RED-MIDDLE",
            'attribute_set_code' => 'Default',
            'product_type' => 'simple',
            'product_websites' => 'base',
            'name' => 'FireGento Simple Product Red,Size Middle',
            'price' => '1.0000',
            'color' => 'red',
            'size' => 'M'
        );

        $products [] = array(
            'sku' => 'CONFIG-Product',
            'attribute_set_code' => 'Default',
            'product_type' => 'configurable',
            'product_websites' => 'base',
            'name' => 'FireGento Test Product Configurable',
            'price' => '10.000',
            'configurable_variation_labels' => 'Color',
            'configurable_variations' => array(
                array(
                    'sku' => 'SIMPLE-BLUE-SMALL',
                    'color' => 'blue',
                    'size' => 'S'),
                array(
                    'sku' => 'SIMPLE-RED-MIDDLE',
                    'color' => 'red',
                    'size' => 'M'),
            )

        );


        return $products;
    }
}