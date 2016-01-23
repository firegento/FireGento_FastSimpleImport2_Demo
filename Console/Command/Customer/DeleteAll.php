<?php
/**
 * Copyright © 2016 FireGento e.V. - All rights reserved.
 * See LICENSE.md bundled with this module for license details.
 */
namespace FireGento\FastSimpleImport2Demo\Console\Command\Customer;

use FireGento\FastSimpleImport2Demo\Console\Command\AbstractImportCommand;
use Magento\ImportExport\Model\Import;

/**
 * Class TestCommand
 * @package FireGento\FastSimpleImport2\Console\Command
 *
 */
class DeleteAll extends AbstractImportCommand
{


    protected function configure()
    {
        $this->setName('firegento:fastsimpleimport2demo:deletecustomers')
            ->setDescription('Delete Customers ');

        $this->setBehavior(Import::BEHAVIOR_DELETE);
        $this->setEntityCode('customer');

        parent::configure();
    }

    /**
     * @return array
     */
    protected function getEntities()
    {

        $customerFactory = $this->objectManager->create('Magento\Customer\Model\CustomerFactory');
        $productCollection = $customerFactory->create()->getCollection();
        $data = [];
        foreach ($productCollection as $product) {
            $data[] = array(
                'sku' => $product->getSku()
            );
        }
        return $data;
    }
}