<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Http\Client;
use Cake\Mailer\Email;

/**
 * Contacts Controller
 */
class ContactsController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->Crud->enable(['index', 'add']);

        $this->Security->setConfig('unlockedActions', [
            'add'
        ]);

        $this->Security->setConfig('unlockedFields', [
            'g-recaptcha-response'
        ]);
    }

    public function index()
    {
        return $this->Crud->execute();
    }

    public function add()
    {
        $this->Crud->view('add', 'index');

        $this->Crud->on('beforeSave', function(Event $event) {
            if (!$this->validateReCaptcha()) {
                $this->Flash->error(__("You didn't pass through reCAPTCHA validation. You need to confirm you're not a robot."));
                $this->Contacts->setReCaptchaStatus(false);
            }
        });

        $this->Crud->on('afterSave', function(Event $event) {
            $subject = $event->getSubject();
            if ($subject->success) {
                $this->sendEmail($subject->entity->name, $subject->entity->email, [
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
                $subject->text = __('An error occurred while trying to send your email');
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

        $this->set(compact('countryOptions'));
        $this->set('typeOptions', $this->Contacts->getTypeOptions());
    }

    protected function validateReCaptcha()
    {
        $data = $this->getRequest()->getData();

        $rcToken = $data['g-recaptcha-response'];
        $http = new Client();

        $response = $http->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => '6LcDyaIUAAAAAKFOdSe1z80l0R1nkpwgo5QWs0H4',
            'response' => $rcToken
        ]);

        $gJson = $response->getJson();
        if ($gJson['success']) {
            return true;
        } else {
            return false;
        }
    }

    protected function sendEmail($name, $from, $vars = [])
    {
        $email = new Email('default');
        $email->setEmailFormat('html')
            ->setFrom([$from => $name])
            ->setTo('support@eramba.org')
            ->setSubject("E-mail from eramba website's contact form");

        $email->viewBuilder()->setLayout('default');
        $email->viewBuilder()->setTemplate('contact_form');

        $email->setViewVars($vars);

        $email->send();
    }
}
