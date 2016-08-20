<?php
/**
 * Copyright © 2016 FireGento e.V. - All rights reserved.
 * See LICENSE.md bundled with this module for license details.
 */
namespace FireGento\FastSimpleImportDemo\Console\Command\Customer;

use FireGento\FastSimpleImportDemo\Console\Command\AbstractImportCommand;
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
        $this->setName('fastsimpleimportdemo:customers:delete')
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
        $customerCollection = $customerFactory->create()->getCollection();
        $data = [];
        foreach ($customerCollection as $customer) {
            $data[] = array(
                'email' => $customer->getData('email'),
                '_website' => 'base',
                '_store' => 'default',
            );
        }
        return $data;
    }
    public function afterFinishImport(){
        $indexerFactory = $this->objectManager->create('Magento\Indexer\Model\IndexerFactory');
        $indexer = $indexerFactory->create();
        $indexer->load("customer_grid");
        $indexer->reindexAll();
    }
}