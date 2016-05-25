# FireGento_FastSimpleImport2_Demo
Demo module for calling FireGento_FastSimpleImport2 via command line

Installation Instructions with Composer
---------------------------------------------

    composer config repositories.firegento_fastsimpleimportdemo vcs https://github.com/firegento/FireGento_FastSimpleImport2_Demo
    composer require firegento/fastsimpleimport2demo dev-master
    bin/magento module:enable FireGento_FastSimpleImport2Demo
    bin/magento setup:upgrade




## Products

### Import simple products:
`bin/magento fastsimpleimport2demo:products:importsimple`

### Import configurable products:
`bin/magento fastsimpleimport2demo:products:importconfigurable`

### Import bundle products:
`bin/magento fastsimpleimport2demo:products:importbundle`

### Delete all products in Catalog(Warning : really all Products):
`bin/magento fastsimpleimport2demo:products:deleteall`


## Customers

### Import customers(Please reindex after importing):
`bin/magento fastsimpleimport2demo:customers:import`

### Delete all customers:
`bin/magento fastsimpleimport2demo:customers:deleteall`

