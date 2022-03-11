<?php
/**
 * Copyright © 2016 - 2022 FireGento e.V. - All rights reserved.
 * See LICENSE.md bundled with this module for license details.
 */

namespace FireGento\FastSimpleImportDemo\Console\Command\Product;

use FireGento\FastSimpleImport\Model\Importer;
use Magento\Catalog\Api\ProductAttributeOptionManagementInterface;
use Magento\Catalog\Model\Product;
use Magento\ImportExport\Model\Import;
use Magento\ImportExport\Model\Import\ErrorProcessing\ProcessingErrorAggregatorInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ImportSimple
 *
 * @package FireGento\FastSimpleImport2\Console\Command
 *
 */
class ImportSimple extends Command
{
    private Importer                                  $importer;
    private ProductAttributeOptionManagementInterface $productAttributeOptionManagement;

    public function __construct(
        Importer $importer,
        ProductAttributeOptionManagementInterface $productAttributeOptionManagement,
        string $name = null
    ) {
        parent::__construct($name);
        $this->importer = $importer;
        $this->productAttributeOptionManagement = $productAttributeOptionManagement;
    }

    public function deleteOption(string $attributeCode, string $label)
    {
        $attributeOptionList = $this->productAttributeOptionManagement->getItems($attributeCode);
        foreach ($attributeOptionList as $attributeOptionInterface) {
            if ($attributeOptionInterface->getLabel() == $label) {
                $this->productAttributeOptionManagement->delete($attributeCode, $attributeOptionInterface->getValue());
            }
        }
    }

    protected function configure()
    {
        $this
            ->setName('fastsimpleimportdemo:products:importsimple')
            ->setDescription('Import Simple Products ');

        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return null|int null or 0 if everything went fine, or an error code
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Import started');

        $time = microtime(true);

        $importer = $this->importer;

        // The following settings are optional as they use the default settings:
        $importer->setBehavior(Import::BEHAVIOR_REPLACE);
        $importer->setEntityCode(Product::ENTITY);
        $importer->setValidationStrategy(ProcessingErrorAggregatorInterface::VALIDATION_STRATEGY_STOP_ON_ERROR);
        $importer->setAllowedErrorCount(0);
        $importer->setIgnoreDuplicates(false);

        try {
            $importer->processImport($this->getImportData());
            $output->write($importer->getErrorMessages()); // displays non-fatal errors if errors are skipped
        } catch (\Exception $e) {
            $output->writeln($e->getMessage()); // displays error messages if import failed
            return 1;
        }

        $output->writeln('Import finished. Elapsed time: ' . round(microtime(true) - $time, 2) . 's' . "\n");

        return 0;
    }

    private function getImportData(): array
    {
        $this->deleteOption('color', 'PurpleBlue');
        $data = [];
        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'sku'                => 'FIREGENTO-' . $i,
                'attribute_set_code' => 'Default',
                'product_type'       => 'simple',
                'product_websites'   => 'base',
                'name'               => 'FireGento Test Product ' . $i,
                'url_key'            => 'firegento-test-product-' . $i,
                'price'              => '14.0000',
                'stock_status'       => '1',
                'ean'                => '1234',
                'color'              => 'PurpleBlue',
                //'visibility' => 'Catalog, Search',
                //'tax_class_name' => 'Taxable Goods',
                //'product_online' => '1',
                //'weight' => '1.0000',
                //'short_description' => NULL,
                //'description' => '',
            ];
        }

        return $data;
    }
}
