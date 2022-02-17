# evote-movie-2022-06-movie-db-table

part of the evote-2022 project sequence

- [https://github.com/dr-matt-smith/evote-movie-2022](https://github.com/dr-matt-smith/evote-movie-2022)


## NOTES for this project step

Add PDO DB library and get Movies from database table

- add library `pdo-crud-for-free-repositories` to the project using Composer:

    ```bash
    composer req mattsmithdev/pdo-crud-for-free-repositories
    ```

- create a file `.env` containing your MySQL database credentials, for example:
    
    ```dotenv
    MYSQL_USER=root
    MYSQL_PASSWORD=passpass
    MYSQL_HOST=127.0.0.1
    MYSQL_PORT=3306
    MYSQL_DATABASE=evote2022
    ```

  - replace `passpass` with the MySQL root password for your computer system

- create a new folder `db` containing a PHP script `migrationsAndFixtures.php`

- copy the contents of the `findAll()` method of class `MovieRepository` into file `db/migrationsAndFixtures.php`

    - we'll complete this file later

- create a new class `/src/MovieRepository.php` and make this empty class inherit from ` Mattsmithdev\PdoCrudRepo\DatabaseTableRepository`:

    ```php
        namespace Tudublin;
        
        use Mattsmithdev\PdoCrudRepo\DatabaseTableRepository;
        
        class MovieRepository extends DatabaseTableRepository
        {
        
        }
    ```

- create a new directory `/dbsetup`, containing file `migrationsAndFixtures.php` to create/reset a DB table `movie`, then get the array of `Movie` objects from a `MovieFixtures` object, and insert all those objects into the datatabase

  ```php
        require_once __DIR__ . '/../vendor/autoload.php';
        
        $movieRepository = new \Tudublin\MovieRepository();
        $movieRepository->resetTable();
        
        $movieFixtures = new \Tudublin\MovieFixtures();
        $movies = $movieFixtures->getObjectArray();
        $movieRepository->insertMany($movies);
  ```

- at the command line, execute PHP script `/dbsetup/migrationAndFixtures.php`. If no schema matching the name in your `.env` file exists, then a new schema of the specified name will be created, and a messasge displayed to confirm this action:

    ```bash
      matt$ php dbsetup/migrationAndFixtures.php 

        database 'evote2022' did not exists, so new schema created

    ```
- refactor the `list()` method of class `MainController` to create a repository object, and dynamically retreive all `Movie` objects from teh MySQL database:

  ```php
        public function list()
        {
            $movieRepository = new MovieRepository();
            $movies = $movieRepository->findAll();
    
            require_once __DIR__ . '/../templates/list.php';
        }
  ```