        <?php
        require_once __DIR__ . '/../vendor/autoload.php';

        $movieRepository = new \Tudublin\MovieRepository();
        $movieRepository->resetTable();

        $movieFixtures = new \Tudublin\MovieFixtures();
        $movies = $movieFixtures->getObjectArray();
        $movieRepository->insertMany($movies);

