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
                    'DocumentationRelations',
                    'DocumentationVideos'
                ]
            ]
        ])->toArray();

        $documentationItems = [];
        foreach ($docCategories as $category) {
            foreach ($category->documentations as $documentation) {
                $documentationItems[$documentation->id] = [
                    'title' => $documentation->title,
                    'relatedItems' => Hash::extract($documentation->documentation_relations, '{n}.related_documentation_id')
                ];

                //
                // Add videos
                $videos = [];
                foreach ($documentation->documentation_videos as $video) {
                    $videos[] = [
                        'title' => $video->title,
                        'videoId' => $video->video
                    ];
                }
                $documentationItems[$documentation->id]['video'] = $videos;
                //
            }
        }
        
        $documentationItemsJson = json_encode($documentationItems);
        
        $this->set(compact('docCategories', 'documentationItemsJson'));

        return $this->Crud->execute();
    }
}
