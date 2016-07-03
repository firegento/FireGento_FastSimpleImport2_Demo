<?php
/**
 * *
 *  * Copyright © Elias Kotlyar - All rights reserved.
 *  * See LICENSE.md bundled with this module for license details.
 *
 */
namespace FireGento\FastSimpleImport2Demo\Console\Command\Orders;
use Magento\ImportExport\Model\Import;
use FireGento\FastSimpleImport2Demo\Console\Command\AbstractExportCommand;
/**
 * Class TestCommand
 * @package FireGento\FastSimpleImport2\Console\Command
 *
 */
class ExportOrders extends AbstractExportCommand
{


    protected function configure()
    {
        $this->setName('fastsimpleimport2demo:orders:export')
            ->setDescription('Export Orders ');
        $this->setEntityCode('sales_order');

        parent::configure();
    }


}