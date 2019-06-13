<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Hash;

/**
 * Documentations Controller
 */
class DocumentationsController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->Crud->enable(['index']);

        $this->loadModel('DocumentationCategories');
    }

    public function index()
    {
        $docCategories = $this->DocumentationCategories->find('all', [
            'contain' => [
                'Documentations' => [
                    'DocumentationRelations'
                ]
            ]
        ])->toArray();
        // debug($docCategories);exit;
        // $documentations = Hash::extract($docCategories, '{n}.documentations');
        // debug($documentations);exit;

        $documentationItems = [];
        foreach ($docCategories as $category) {
            foreach ($category->documentations as $documentation) {
                $documentationItems[$documentation->id] = [
                    'title' => $documentation->title,
                    'video' => $documentation->video,
                    'relatedItems' => Hash::extract($documentation->documentation_relations, '{n}.related_documentation_id')
                ];
            }
        }

        $documentationItemsJson = json_encode($documentationItems);
        // debug($documentationItems);
        $this->set(compact('docCategories', 'documentationItemsJson'));

        return $this->Crud->execute();
    }
}
