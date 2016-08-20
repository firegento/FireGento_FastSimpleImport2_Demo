<?php
/**
 * *
 *  * Copyright © Elias Kotlyar - All rights reserved.
 *  * See LICENSE.md bundled with this module for license details.
 *
 */
namespace FireGento\FastSimpleImportDemo\Console\Command\Orders;
use Magento\ImportExport\Model\Import;
use FireGento\FastSimpleImportDemo\Console\Command\AbstractExportCommand;
/**
 * Class TestCommand
 * @package FireGento\FastSimpleImport2\Console\Command
 *
 */
class ExportOrders extends AbstractExportCommand
{


    protected function configure()
    {
        $this->setName('fastsimpleimportdemo:orders:export')
            ->setDescription('Export Orders ');
        $this->setEntityCode('sales_order');

        parent::configure();
    }


}