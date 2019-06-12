<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Releases Controller
 */
class ReleasesController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->modelClass = false;

        $this->Crud->enable(['index']);
    }

    public function index()
    {
        return $this->Crud->execute();
    }
}
