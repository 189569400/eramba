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
            'subject' => "E-mail from eramba website's contact form",
            'template' => 'contact_form'
        ]);

        $this->Crud->enable(['index', 'add']);
    }

    public function index()
    {
        $this->Crud->on('beforeRender', function(Event $event) {
            //
            // Preset type if it was passed as query param
            $contact = $this->Contacts->newEntity();
            $contact->type = $this->getRequest()->getQuery('type', 0);
            $this->set(compact('contact'));
            //
        });

        return $this->Crud->execute();
    }

    public function add()
    {
        $this->Crud->view('add', 'index');

        $this->Crud->on('afterSave', function(Event $event) {
            $subject = $event->getSubject();
            if ($subject->success) {
                $this->loadModel('Countries');
                $this->loadModel('States');
                $this->loadModel('Cities');
                $this->Email->sendEmail('eramba', 'web@licenses.eramba.org', [
                    'name' => $subject->entity->name,
                    'country' => $this->Countries->getCountryName($subject->entity->country_id),
                    'state' => $this->States->getStateName($subject->entity->state_id),
                    'city' => $this->Cities->getCityName($subject->entity->city_id),
                    'type' => $this->Contacts->getTypes($subject->entity->type),
                    'email' => $subject->entity->email,
                    'body' => $subject->entity->body
                ]);
            }
        });
        
        $this->getEventManager()->on('Crud.setFlash', function(Event $event) {
            $subject = $event->getSubject();
            if (!$subject->success) {
                $subject->text = __('We could not process your request - check the form below to see what went wrong!');
            } else {
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
        $countryOptions = [-1 => __('My country is not listed')] + $countryOptions;

        $this->set(compact('countryOptions'));
        $this->set('typeOptions', $this->Contacts->getTypes());
    }

    public function getStatesList($country_id = null)
    {
        $this->autoRender = false;

        $this->loadModel('States');
        $stateOptions = $this->States->find('list', [
            'keyField' => 'id',
            'valueField' => 'name'
        ])->order([
            'States.name' => 'ASC'
        ])->where([
            'country_id' => $country_id
        ])->toArray();
        $stateOptions = [-1 => __('My state is not listed')] + $stateOptions;
        $stateOptions = [0 => __('Select State')] + $stateOptions;
        $results = [];
        foreach ($stateOptions as $key => $val) {
            $results[] = [
                'text' => $val,
                'id' => $key
            ];
        }

        echo json_encode($results);
        exit;
    }

    public function getCitiesList($state_id = null)
    {
        $this->autoRender = false;

        $this->loadModel('Cities');
        $cityOptions = $this->Cities->find('list', [
            'keyField' => 'id',
            'valueField' => 'name'
        ])->order([
            'Cities.name' => 'ASC'
        ])->where([
            'state_id' => $state_id
        ])->toArray();
        $cityOptions = [-1 => __('My city is not listed')] + $cityOptions;
        $cityOptions = [0 => __('Select City')] + $cityOptions;
        $results = [];
        foreach ($cityOptions as $key => $val) {
            $results[] = [
                'text' => $val,
                'id' => $key
            ];
        }

        echo json_encode($results);
        exit;
    }
}
