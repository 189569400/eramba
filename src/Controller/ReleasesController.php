<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Exception\Exception;
use App\Model\Table\ReleasesTable;

/**
 * Releases Controller
 */
class ReleasesController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('SupportConnector.SupportConnector');

        $this->Crud->enable(['index']);
    }

    public function index()
    {
        $eReleases = $this->Releases->find('all')
            ->select([
                'type', 'version', 'release_date', 'changelog'
            ])->where([
                'type' => ReleasesTable::TYPE_ENTERPRISE
            ])->limit(5)->toArray();

        $cReleases = $this->Releases->find('all')
            ->select([
                'type', 'version', 'release_date', 'changelog'
            ])->where([
                'type' => ReleasesTable::TYPE_COMMUNITY
            ])->limit(5)->toArray();

        $this->set(compact('eReleases', 'cReleases'));
        
        return $this->Crud->execute();
    }

    public function update($secKey)
    {
        $this->autoRender = false;

        $updateSecurityKey = file_get_contents(CONFIG . 'releases_sec_key.txt');
        if ($secKey === $updateSecurityKey) {
            //
            // Clean up tables
            $this->Releases->deleteAll([]);
            // 

            //
            // Save actual data from Support server
            $releasesData = $this->SupportConnector->getReleases();

            if (array_key_exists('message', $releasesData)) {
                echo $releasesData['message'];
            } else {
                $ret = true;
                foreach ($releasesData as $rd) {
                    foreach ($rd as $releaseData) {
                        $release = $this->Releases->newEntity();
                        $type = 0;
                        if ($releaseData['type'] === 'enterprise') {
                            $type = ReleasesTable::TYPE_ENTERPRISE;
                        } elseif ($releaseData['type'] === 'community') {
                            $type = ReleasesTable::TYPE_COMMUNITY;
                        }
                        $release->type = $type;
                        $release->version = $releaseData['version'];
                        $release->release_date = date('Y-m-d H:i:s', strtotime($releaseData['date']));
                        $release->changelog = $releaseData['changelog'];

                        if (!$this->Releases->save($release)) {
                            $ret = false;
                        }
                    }
                }

                if ($ret) {
                    echo __('Successfully updated');
                } else {
                    echo __('Update failed');
                }
            }
            //
        } else {
            throw new Exception('You don\'t have permission to do this action');
        }
    }
}
