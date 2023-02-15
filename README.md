# Installation : 

### Étape 1 : 

- clonez le projet sur votre machine en utilisant git puis accédez au fichier du projet en définissant le fichier .env.
- dans le fichier .env vous devez spécifier l'adresse de votre base de données et les informations d'identification (username & password).

> git clone https://github.com/codecampers-2023/gestion-breifs-projets

> cd gestion-breifs-projets

> copy .env.example  .env 
(puis modifiez le fichier .env comme indiqué ci-dessus.)

### Étape 2 :
- dans votre console, initialisez le projet en utilisant les commandes suivantes : 

> composer install 

> php atisan migrate

> php artisan key:generate

> php artisan serve