To install:

`php composer.phar install && npm install  && bower install`

Create database with name `rest_helper` and run command:

`./vendor/bin/doctrine-module orm:schema-tool:create`

if necessary updates run next one:

`./vendor/bin/doctrine-module orm:schema-tool:update`
