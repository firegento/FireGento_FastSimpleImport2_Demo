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
class ImportCustomer extends AbstractImportCommand
{


    protected function configure()
    {
        $this->setName('fastsimpleimport2demo:customers:import')
            ->setDescription('Import Customer ');

        $this->setBehavior(Import::BEHAVIOR_APPEND);
        $this->setEntityCode('customer');

        parent::configure();
    }

    /**
     * @return array
     */
    protected function getEntities()
    {
        $data = [];
        for ($i = 1; $i <= 1; $i++) {
            $data[] = array(
                'email' => 'testemail@firegento.de',
                '_website' => 'base',
                '_store' => 'default',
                'confirmation' => '',
                'created_at' => '2015-12-26 18:05:23',
                'created_in' => 'Default Store View',
                'disable_auto_group_change' => '0',
                'dob' => '1973-12-15',
                'firstname' => 'Veronica',
                'gender' => 'Female',
                'group_id' => '1',
                'lastname' => 'Costello',
                'middlename' => '',
                'password_hash' => '',
                'prefix' => '',
                'rp_token' => '',
                'rp_token_created_at' => '',
                'store_id' => '1',
                'suffix' => '',
                'taxvat' => '',
                'updated_at' => '2015-12-26 18:05:23',
                'website_id' => '1',
                'password' => 'TestTest',

            );
        }
        return $data;
    }
}



