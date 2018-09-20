<?php
namespace FireGento\FastSimpleImportDemo\Console\Command\Product;

use Magento\Framework\Component\ComponentRegistrar;
use Magento\Framework\App\Filesystem\DirectoryList;
use FireGento\FastSimpleImportDemo\Console\Command\AbstractImportCommand;
use Magento\Framework\App\ObjectManagerFactory;
use Magento\ImportExport\Model\Import;
use League\Csv\Reader;
use League\Csv\Statement;

class ImportCsv extends AbstractImportCommand
{
    const IMPORT_FILE = "importfile.csv";

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
    )
    {

        parent::__construct($objectManagerFactory);


        $this->readFactory = $readFactory;

        $this->directory_list = $directory_list;
    }

    protected function configure()
    {

        $this->setName('fastsimpleimportdemo:products:importcsv')
            ->setDescription('Import Products from CSV');
        $this->setBehavior(Import::BEHAVIOR_ADD_UPDATE);
        $this->setEntityCode('catalog_product');

        parent::configure();
    }

    /**
     * @return array
     */
    protected function getEntities()
    {
        $csvIterationObject = $this->readCSV();
        $data = array();
        // Do mapping here:
        foreach($csvIterationObject as $row){
            $data[]  = $row;
        }
        //  Mapping end
        //var_dump($data);
        //die();
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
