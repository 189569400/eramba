<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Contacts Controller
 */
class ContactsController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('ReCaptcha.ReCaptcha');
        $this->loadComponent('Email', [
            'template' => 'contact_form'
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
                $this->Email->sendEmail($subject->entity->name, $subject->entity->email, [
                    'name' => $subject->entity->name,
                    'country' => $subject->entity->country_id,
                    'type' => $subject->entity->type,
                    'email' => $subject->entity->email
                ]);
            }
        });
        
        $this->getEventManager()->on('Crud.setFlash', function(Event $event) {
            $subject = $event->getSubject();
            if (!$subject->success) {
                $subject->element = 'error';
                $subject->text = __('We could not process your request - check the form below to see what went wrong!');
            } else {
                $subject->element = 'success';
                $subject->text = __('E-mail has been sent successfully');
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
        $this->set('typeOptions', $this->Contacts->getTypeOptions());
    }
}
