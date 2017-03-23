# booklib-imie
Projet BookLib mars 2017

1. composer update
2. Modifier le fichier parameters.yml
3. php bin/console doctrine:database:drop --force
4. php bin/console doctrine:database:create
5. php bin/console doctrine:schema:update --force
6. php bin/console doctrine:fixtures:load
