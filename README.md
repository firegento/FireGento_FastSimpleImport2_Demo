# FireGento_FastSimpleImport_Demo
Demo module for calling FireGento_FastSimpleImport via command line



Installation Instructions with Composer
---------------------------------------------

    composer require firegento/fastsimpleimportdemo
    bin/magento module:enable FireGento_FastSimpleImportDemo
    bin/magento setup:upgrade
    
    


Installation Instructions with Composer(Master Branch)
---------------------------------------------

    composer config repositories.firegento_fastsimpleimportdemo vcs https://github.com/firegento/FireGento_FastSimpleImport2_Demo
    composer require firegento/fastsimpleimportdemo dev-master
    bin/magento module:enable FireGento_FastSimpleImportDemo
    bin/magento setup:upgrade




## Products

### Import simple products:
`bin/magento fastsimpleimportdemo:products:importsimple`

### Import configurable products:
`bin/magento fastsimpleimportdemo:products:importconfigurable`

### Import bundle products:
`bin/magento fastsimpleimportdemo:products:importbundle`

### Import simple Products with multiselect-attributes:
`bin/magento fastsimpleimportdemo:products:importmultiselect`

### Delete all products in Catalog(Warning : really all Products):
`bin/magento fastsimpleimportdemo:products:deleteall`

### Import products from CSV File:
`bin/magento fastsimpleimportdemo:products:importcsv`

## Customers

### Import customers
`bin/magento fastsimpleimportdemo:customers:import`



### Delete all customers:
`bin/magento fastsimpleimportdemo:customers:deleteall`

## Categories

### Import Categories:
`bin/magento fastsimpleimportdemo:category:import`

### Import products from CSV File:(currently building)
`bin/magento fastsimpleimportdemo:category:importcsv`
