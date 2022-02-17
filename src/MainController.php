<?php

namespace Tudublin;

class MainController
{
    public function index()
    {
        require_once __DIR__ . '/../templates/index.php';
    }

    public function about()
    {
        require_once __DIR__ . '/../templates/about.php';
    }

    public function contact()
    {
        require_once __DIR__ . '/../templates/contact.php';
    }
    
    public function sitemap()
    {
        require_once __DIR__ . '/../templates/sitemap.php';
    }

    public function list()
    {
        $movieRepository = new MovieRepository();
        $movies = $movieRepository->findAll();

        require_once __DIR__ . '/../templates/list.php';
    }

}