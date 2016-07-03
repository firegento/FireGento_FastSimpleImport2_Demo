<?php
/**
 * Copyright © 2016 FireGento e.V. - All rights reserved.
 * See LICENSE.md bundled with this module for license details.
 */
namespace FireGento\FastSimpleImport2Demo\Console\Command\Product;
use FireGento\FastSimpleImport2Demo\Console\Command\AbstractImportCommand;
use Magento\Framework\App\ObjectManagerFactory;
use Magento\ImportExport\Model\Import;
use Magento\Catalog\Api\ProductAttributeOptionManagementInterface;
/**
 * Class TestCommand
 * @package FireGento\FastSimpleImport2\Console\Command
 *
 */
class ImportSimple extends AbstractImportCommand
{
    /**
     * @var ProductAttributeOptionManagementInterface
     */
    private $attributeOptionManagementInterface;


    public function deleteOption($attrCode,$label){
        $attributeOptionList = $this->attributeOptionManagementInterface->getItems($attrCode);
        foreach ($attributeOptionList as $attributeOptionInterface) {
            if ($attributeOptionInterface->getLabel() == $label) {
               $this->attributeOptionManagementInterface->delete($attrCode,$attributeOptionInterface->getValue() );
            }
        }
    }


    protected function configure()
    {
        $this->setName('fastsimpleimport2demo:products:importsimple')
            ->setDescription('Import Simple Products ');

        $this->setBehavior(Import::BEHAVIOR_ADD_UPDATE);
        $this->setEntityCode('catalog_product');

        parent::configure();
    }

    /**
     * @return array
     */
    protected function getEntities()
    {
        $this->attributeOptionManagementInterface = $this->objectManager->get("Magento\Catalog\Api\ProductAttributeOptionManagementInterface");
        $this->deleteOption('color', 'PurpleBlue' );
        $data = [];
        for ($i = 1; $i <= 1; $i++) {
            $data[] = array(
                'sku' => 'FIREGENTO-' . $i,
                'attribute_set_code' => 'Default',
                'product_type' => 'simple',
                'product_websites' => 'base',
                'name' => 'FireGento Test Product ' . $i,
                'price' => '14.0000',
                'ean' => "1234",
                'color' => "PurpleBlue"
                //'visibility' => 'Catalog, Search',
                //'tax_class_name' => 'Taxable Goods',
                //'product_online' => '1',
                //'weight' => '1.0000',
                //'short_description' => NULL,
                //'description' => '',
            );
        }
        return $data;
    }
}