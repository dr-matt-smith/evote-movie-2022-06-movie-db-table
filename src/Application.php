<?php

namespace Tudublin;

class Application
{
    public function run()
    {
        $action = filter_input(INPUT_GET, 'action');
        $mainController = new MainController();

        switch ($action){
            case 'about':
                $mainController->about();
                break;

            case 'contact':
                $mainController->contact();
                break;

            case 'sitemap':
                $mainController->sitemap();
                break;

            case 'list':
                $mainController->list();
                break;

            default:
                $mainController->index();
        }
    }
}