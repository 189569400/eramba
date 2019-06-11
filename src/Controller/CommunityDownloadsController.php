<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * CommunityDownloads Controller
 */
class CommunityDownloadsController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('ReCaptcha.ReCaptcha');
        $this->loadComponent('Email', [
            'template' => 'community_download'
        ]);

        $this->Crud->enable(['index', 'add']);

        $this->Security->setConfig('unlockedActions', [
            'add'
        ]);
    }

    public function index()
    {
        return $this->Crud->execute();
    }

    public function add()
    {
        $this->Crud->view('add', 'index');

        $this->Crud->on('afterSave', function(Event $event) {
            $subject = $event->getSubject();
            if ($subject->success) {
                $this->Email->sendEmail($subject->entity->name, $subject->entity->email);
            }
        });

        $this->getEventManager()->on('Crud.setFlash', function(Event $event) {
            $subject = $event->getSubject();
            if (!$subject->success) {
                $subject->text = __('We could not process your request - check the form below to see what went wrong!');
            } else {
                $subject->text = __("We've sent you an email with link where you can download community version of eramba");
            }
        });

        return $this->Crud->execute();
    }

    public function beforeRender(Event $event)
    {
        parent::beforeRender($event);

        $this->loadModel('Countries');
        $countryOptions = $this->Countries->find('list', [
            'keyField' => 'id',
            'valueField' => 'name'
        ])->order([
            'Countries.name' => 'ASC'
        ])->toArray();

        $this->set(compact('countryOptions'));
    }
}
