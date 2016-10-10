<?php
/**
 * *
 *  * Copyright © Elias Kotlyar - All rights reserved.
 *  * See LICENSE.md bundled with this module for license details.
 *
 */
namespace FireGento\FastSimpleImportDemo\Console\Command\Customer;
use Magento\ImportExport\Model\Import;
use FireGento\FastSimpleImportDemo\Console\Command\AbstractExportCommand;
/**
 * Class TestCommand
 * @package FireGento\FastSimpleImport2\Console\Command
 *
 */
class ExportCustomer extends AbstractExportCommand
{


    protected function configure()
    {
        $this->setName('fastsimpleimportdemo:customers:export')
            ->setDescription('Export Customers');
        $this->setEntityCode('customer');

        parent::configure();
    }


}