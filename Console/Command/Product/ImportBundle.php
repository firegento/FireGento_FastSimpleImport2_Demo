<?php
/**
 * Copyright © 2016 FireGento e.V. - All rights reserved.
 * See LICENSE.md bundled with this module for license details.
 */
namespace FireGento\FastSimpleImport2Demo\Console\Command\Product;

use FireGento\FastSimpleImport2Demo\Console\Command\AbstractImportCommand;
use Magento\ImportExport\Model\Import;

/**
 * Class TestCommand
 * @package FireGento\FastSimpleImport2\Console\Command
 *
 */
class ImportBundle extends AbstractImportCommand
{


    protected function configure()
    {
        $this->setName('fastsimpleimport2demo:products:importbundle')
            ->setDescription('Import Bundle Products ');

        $this->setBehavior(Import::BEHAVIOR_APPEND);
        $this->setEntityCode('catalog_product');

        parent::configure();
    }

    /**
     * @return array
     */
    protected function getEntities()
    {
        $simpleProducts = [];
        $bundleProduct = array(
            'sku' => 'Bundle-Product',
            'attribute_set_code' => 'Default',
            'product_type' => 'bundle',
            'product_websites' => 'base',
            'name' => 'FireGento Test Product Bundle',
            'price' => '10.000',

            'bundle_price_type' => 'dynamic',
            'bundle_sku_type' => 'dynamic',
            'bundle_price_view' => 'Price range',
            'bundle_weight_type' => 'dynamic',


        );

        $colors = array("blue", "black");
        $bundleValues = '';
        for ($i = 0; $i < 2; $i++) {

            $color = $colors[$i];
            $sku = 'SIMPLE-' . $color;
            $simpleProducts[] = array(
                'sku' => $sku,
                'attribute_set_code' => 'Default',
                'product_type' => 'simple',
                'product_websites' => 'base',
                'name' => 'FireGento Test Product Simple - ' . $color,
                'price' => '14.0000',
                'additional_attributes' => "color=" . $color

            );
            $bundleAttributes = array(
                "name" => "Color",
                "type" => 'radio',
                'required' => '1',
                'sku' => $sku,
                'price' => '14.0000',
                'default' => $i,
                'default_qty' => '1.0000',
                'price_type' => 'fixed'
            );


            $bundleValues .= $this->arrayToAttributeString($bundleAttributes) . "|";

        }
        $bundleProduct["bundle_values"] = $bundleValues;
        print_r($bundleProduct);


        $data = array_merge($simpleProducts, array($bundleProduct));


        return $data;
    }
}






