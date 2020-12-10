# Magento Environments

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities
This module shows an environment bar in the backoffice depending on the environment URL.
It is useful when you want to have a visual warning telling you which environment you are in: Production, Staging, Development or Other.

* You can choose the color you want each environment to display

![Image of Magento Default](https://github.com/catgento/magento-2-environments/blob/master/media/environments-1.png)


## Installation

### Type 1: Composer

- Install the module composer by running

`composer require catgento/module-environments`

 - enable the module by running 

`php bin/magento module:enable Catgento_Environments`

 - apply database updates by running 
   
`php bin/magento setup:upgrade`

 - Flush the cache by running 
   
`php bin/magento cache:flush`

### Type 2: Zip file

- Unzip the zip file in `app/code/Catgento`
- Enable the module by running `php bin/magento module:enable Catgento_Environments`
- Apply database updates by running `php bin/magento setup:upgrade`\*
- Flush the cache by running `php bin/magento cache:flush`


## Configuration

Environment bar can be enabled in Stores » Configuration » Advanced » System, Environment Bar tab.

You can set the environment urls and the colors for each environment. In case the 'current environmnet' is not in the environments
list, the bar will display the current url with a grey background color.

![Image of Magento Default](https://github.com/catgento/magento-2-environments/blob/master/media/environments-2.png)



