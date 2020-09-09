<?php

namespace FireGento\FastSimpleImportDemo\Console\Command\Product;

use FireGento\FastSimpleImportDemo\Console\Command\AbstractImportCommand;
use League\Csv\Reader;
use League\Csv\Statement;
use Magento\Framework\App\ObjectManagerFactory;
use Magento\ImportExport\Model\Import;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class TestCommand
 *
 * @package FireGento\FastSimpleImport2\Console\Command
 *
 */
class DeleteSelection extends AbstractImportCommand
{
    const IMPORT_FILE = "importDelete.csv";

    private $input;

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

        $this->setDefinition([
            new InputOption('file', null, InputOption::VALUE_OPTIONAL,
                'absolute path of file to be imported for sku list'),
        ]);

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

        if($this->fileArgumentProvided()){
            echo PHP_EOL.'input file:'.$this->getFilePath().'/'.$this->getFileName().PHP_EOL;
        }else{
            echo PHP_EOL.'input file (default file):'.$this->directory_list->getRoot().'/'.self::IMPORT_FILE.PHP_EOL;
        }
        echo PHP_EOL.'sku list to be deleted: '.implode(',',array_column($data,'sku')).PHP_EOL;

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

        if($this->fileArgumentProvided()){
            $path = $this->getFilePath();
            $fileName = $this->getFileName();
        }

        $directoryRead = $this->readFactory->create($path);

        return $directoryRead->readFile($fileName);
    }

    protected function getFilePath(){
        return dirname($this->input->getOption('file'));
    }

    protected function getFileName(){
        return basename($this->input->getOption('file'));
    }

    protected function fileArgumentProvided(){
        if ($this->input->getOption('file')) {
            return file_exists($this->input->getOption('file'));
        }
        return false;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        parent::execute($input, $output);
    }
}