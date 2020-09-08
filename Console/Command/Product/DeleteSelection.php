<?php

namespace FireGento\FastSimpleImportDemo\Console\Command\Product;

use FireGento\FastSimpleImportDemo\Console\Command\AbstractImportCommand;
use League\Csv\Reader;
use League\Csv\Statement;
use Magento\Framework\App\ObjectManagerFactory;
use Magento\ImportExport\Model\Import;

/**
 * Class TestCommand
 *
 * @package FireGento\FastSimpleImport2\Console\Command
 *
 */
class DeleteSelection extends AbstractImportCommand
{
    const IMPORT_FILE = "importDelete.csv";

    /**
     * @var \Magento\Framework\Filesystem\Directory\ReadFactory
     */
    private $readFactory;

    /**
     * @var DirectoryList
     */
    private $directory_list;

    /**
     * Constructor
     *
     * @param ObjectManagerFactory $objectManagerFactory
     */
    public function __construct(
        ObjectManagerFactory $objectManagerFactory,
        \Magento\Framework\Filesystem\Directory\ReadFactory $readFactory,
        \Magento\Framework\App\Filesystem\DirectoryList $directory_list
    ) {

        parent::__construct($objectManagerFactory);

        $this->readFactory = $readFactory;

        $this->directory_list = $directory_list;
    }

    protected function configure()
    {
        $this->setName('fastsimpleimportdemo:products:deleteSelection')->setDescription('Delete Products based on SKU list');

        $this->setBehavior(Import::BEHAVIOR_DELETE);
        $this->setEntityCode('catalog_product');

        parent::configure();
    }

    /**
     * @return array
     */
    protected function getEntities()
    {
        try{
            $csvIterationObject = $this->readCSV();
        }catch (\Exception $exception){
            echo $exception->getMessage();
            return [];
        }

        $data = [];
        foreach ($csvIterationObject as $row) {
            $data[] = $row;
        }

        return $data;
    }

    protected function readCSV()
    {
        $csvObj = Reader::createFromString($this->readFile(static::IMPORT_FILE));
        $csvObj->setDelimiter(',');
        $csvObj->setHeaderOffset(0);
        $results = (new Statement())->process($csvObj);

        return $results;
    }

    protected function readFile($fileName)
    {
        $path = $this->directory_list->getRoot();
        $directoryRead = $this->readFactory->create($path);

        return $directoryRead->readFile($fileName);
    }
}