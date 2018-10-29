To Setup this test project please follow below steps:
-----------------------------------------------

1) First Create Database with name "kishor_test", and find database sql file in "[PROJECT DIR]/DB" folder and import it in created database.
2) Configure the Database in below file.
	- [PROJECT DIR]\app\config\parameters.yml
3) After second(2) step, run below command from "[PROJECT DIR]"
   - $ composer install;
   
4) In last clear the cache and if required give permission to "app/cache and app/log" folder.   
   - $ php app/console cache:clear --env=prod

Now the test project is ready to access, below is the link to access my test project.
   - URL: http://localhost/[PROJECT DIR NAME]/web/app.php


Files which are created/customized are below:
DB:
- [PROJECT DIR]\DB\kishor_test.sql
DB Configuration:
- [PROJECT DIR]\app\config\parameters.yml
Controller:
- [PROJECT DIR]\src\AppBundle\Controller\DefaultController.php

Entities:
- [PROJECT DIR]\src\AppBundle\Entity\Clients.php
- [PROJECT DIR]\src\AppBundle\Entity\Invoicelineitems.php
- [PROJECT DIR]\src\AppBundle\Entity\Invoices.php
- [PROJECT DIR]\src\AppBundle\Entity\Products.php 

Repositories:
- [PROJECT DIR]\src\AppBundle\Repository\ClientsRepository.php
- [PROJECT DIR]\src\AppBundle\Repository\InvoicelineitemsRepository.php
- [PROJECT DIR]\src\AppBundle\Repository\InvoicesRepository.php
- [PROJECT DIR]\src\AppBundle\Repository\ProductsRepository.php 

Twig Template:   
- [PROJECT DIR]\src\AppBundle\Resources\views\listProducts.html.twig

Angular Controller:      
- [PROJECT DIR]\web\angular\js\report.js

Angular Component:
- [PROJECT DIR]\web\angular\js\components\reportComponent.html
- [PROJECT DIR]\web\angular\js\components\reportComponent.js

Project Dependency:
- [PROJECT DIR]\web\angular\js\includes\angular.min.js
- [PROJECT DIR]\web\angular\js\includes\bootstrap.min.js
- [PROJECT DIR]\web\angular\js\includes\jquery.min.js
- [PROJECT DIR]\web\angular\css\bootstrap.min.css   

Thank you.
   



