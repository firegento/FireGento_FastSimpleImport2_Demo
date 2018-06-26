<?php
namespace FireGento\FastSimpleImportDemo\Console\Command\Category;

use Magento\Framework\Component\ComponentRegistrar;
use Magento\Framework\App\Filesystem\DirectoryList;
use FireGento\FastSimpleImportDemo\Console\Command\AbstractImportCommand;
use Magento\Framework\App\ObjectManagerFactory;
use Magento\ImportExport\Model\Import;
use League\Csv\Reader;


class ImportCategoryCsv extends AbstractImportCommand
{
    const IMPORT_FILE = "importCategoryFile.csv";

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

        $this->setName('fastsimpleimportdemo:category:importcsv')
            ->setDescription('Import Category from CSV');
        $this->setBehavior(Import::BEHAVIOR_ADD_UPDATE);
        $this->setEntityCode('catalog_category');

        parent::configure();
    }

    /**
     * @return array
     */
    protected function getEntities()
    {
        /*
            $data[] = array(
            '_root' => 'Default Category',
            '_category' => 'FireGento TestCategory',
            'description' => 'Test2',
            'is_active' => '1',
            'include_in_menu' => '1',
            'meta_description' => 'Meta Test',
            'available_sort_by' => 'position',
            'default_sort_by' => 'position',
            'is_anchor' => '1'
        );
        */

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
        $results = $csvObj->fetchAssoc();
        return $results;

    }

    protected function readFile($fileName)
    {
        $path = $this->directory_list->getRoot();
        $directoryRead = $this->readFactory->create($path);
        return $directoryRead->readFile($fileName);
    }
}