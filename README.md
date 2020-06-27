# FireGento_FastSimpleImport_Demo
<!-- ALL-CONTRIBUTORS-BADGE:START - Do not remove or modify this section -->
[![All Contributors](https://img.shields.io/badge/all_contributors-2-orange.svg?style=flat-square)](#contributors-)
<!-- ALL-CONTRIBUTORS-BADGE:END -->
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

#### Multi Store Environment

`bin/magento fastsimpleimportdemo:category:import:multistoreview`

This assumes that you have a store view with code "en". If this is not the case, please adapat
`Console/Command/Category/ImportCategoryMultiStoreView.php` *before* running this command.




## Contributors ✨

Thanks goes to these wonderful people ([emoji key](https://allcontributors.org/docs/en/emoji-key)):

<!-- ALL-CONTRIBUTORS-LIST:START - Do not remove or modify this section -->
<!-- prettier-ignore-start -->
<!-- markdownlint-disable -->
<table>
  <tr>
    <td align="center"><a href="https://github.com/EliasKotlyar"><img src="https://avatars0.githubusercontent.com/u/9529505?v=4" width="100px;" alt=""/><br /><sub><b>Elias Kotlyar</b></sub></a><br /><a href="https://github.com/firegento/FireGento_FastSimpleImport2_Demo/commits?author=EliasKotlyar" title="Code">💻</a></td>
    <td align="center"><a href="https://github.com/brosenberger"><img src="https://avatars2.githubusercontent.com/u/2969243?v=4" width="100px;" alt=""/><br /><sub><b>Benjamin Rosenberger</b></sub></a><br /><a href="https://github.com/firegento/FireGento_FastSimpleImport2_Demo/commits?author=brosenberger" title="Code">💻</a></td>
  </tr>
</table>

<!-- markdownlint-enable -->
<!-- prettier-ignore-end -->
<!-- ALL-CONTRIBUTORS-LIST:END -->

This project follows the [all-contributors](https://github.com/all-contributors/all-contributors) specification. Contributions of any kind welcome!