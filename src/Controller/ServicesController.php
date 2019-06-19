<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use App\Model\Table\ServicesTable;
use Cake\I18n\Number;
use App\Model\Table\ServiceBillingInformationsTable;
use Cake\Http\Exception\NotFoundException;

/**
 * Services Controller
 */
class ServicesController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Email', [
            'template' => 'order_form'
        ]);

        $this->Crud->enable(['index', 'add']);
    }

    public function index()
    {
        $this->setVersionOptions();

        $session = $this->getRequest()->getSession();
        $sessionData = $session->read('Services');
        if (!empty($sessionData)) {
            $service = $this->Services->newEntity();
            foreach ($sessionData as $key => $val) {
                $service->{$key} = $val;
            }

            $this->set(compact('service'));
        }

        return $this->Crud->execute();
    }

    protected function setVersionOptions()
    {
        $versions = [
            0 => __('Select version')
        ];

        $versions += ServicesTable::getVersions();

        $this->set('versionOptions', $versions);
    }

    public function add()
    {
        $session = $this->getRequest()->getSession();
        $sessionData = $session->read('Services');
        $this->checkMandatoryFields(!empty($sessionData) ? $sessionData : []);

        $this->Crud->on('beforeSave', function(Event $event) {
            $session = $this->getRequest()->getSession();
            $sessionData = $session->read('Services');

            $entity = $event->getSubject()->entity;
            $entity->type = ServicesTable::TYPE_ENTERPRISE;

            // 
            // Add mandatory service fields
            foreach ($sessionData as $key => $val) {
                if ($key === 'start_date') {
                    $val = date('Y-m-d H:i:s', strtotime($val));
                }

                $entity->{$key} = $val;
            }
            //
        });

        $this->Crud->on('afterSave', function(Event $event) {
            $subject = $event->getSubject();
            if ($subject->success) {
                // Delete user data from session
                $this->clearSessionData();

                // Send email
                $this->loadModel('Countries');
                $this->loadModel('ServiceBillingInformations');
                $this->Email->setConfig('subject', __("Purchase Request from www.eramba.org"));
                $this->Email->sendEmail('eramba', 'web@licenses.eramba.org', [
                    'order_number' => $subject->entity->number,
                    'company_name' => $subject->entity->service_billing_information->company_name,
                    'company_address' => $subject->entity->service_billing_information->company_address,
                    'country_name' => $this->Countries->getCountryName($subject->entity->service_billing_information->country_id),
                    'state' => $subject->entity->service_billing_information->state,
                    'city' => $subject->entity->service_billing_information->city,
                    'zip_code' => $subject->entity->service_billing_information->zip_code,
                    'vat_number' => $subject->entity->service_billing_information->vat_number,
                    'name' => $subject->entity->service_billing_information->name,
                    'surname' => $subject->entity->service_billing_information->surname,
                    'email' => $subject->entity->service_billing_information->email,
                    'currency' => $this->ServiceBillingInformations->getCurrencies($subject->entity->service_billing_information->currency),
                    'payment_type' => $this->ServiceBillingInformations->getPaymentTypes($subject->entity->service_billing_information->payment_type),
                    'type' => $this->Services->getTypes($subject->entity->type),
                    'version' => $this->Services->getVersions($subject->entity->version),
                    'start_date' => $subject->entity->start_date,
                    'online_trainings_hours' => $subject->entity->online_trainings_hours,
                    'onsite_workshops_days' => $subject->entity->onsite_workshops_days
                ]);
            }
        });

        $this->Crud->on('beforeRender', function(Event $event) {
            $this->loadModel('Countries');
            $countryOptions = $this->Countries->find('list', [
                'keyField' => 'id',
                'valueField' => 'name'
            ])->order([
                'Countries.name' => 'ASC'
            ])->toArray();

            $currencyOptions = ServiceBillingInformationsTable::getCurrencies();
            $paymentTypeOptions = ServiceBillingInformationsTable::getPaymentTypes();

            $this->set(compact('countryOptions', 'currencyOptions', 'paymentTypeOptions'));
        });

        $this->getEventManager()->on('Crud.setFlash', function(Event $event) {
            $subject = $event->getSubject();
            if (!$subject->success) {
                $subject->text = __('We could not process your request - check the form below to see what went wrong!');
            } else {
                $subject->text = __('Your quote was processed successfully');
            }
        });

        return $this->Crud->execute();
    }

    public function abort()
    {
        $this->clearSessionData();
        return $this->redirect(['controller' => 'Contacts', 'action' => 'index']);
    }

    public function updateBill()
    {
        $this->autoRender = false;

        $data = $this->getRequest()->getData();

        $price = $this->Services->calcPrice($data['Services']);

        echo Number::currency($price, 'EUR', ['places' => 0]);
    }

    public function previewQuote($type = null)
    {
        if (!$this->getRequest()->is('post')) {
            throw new NotFoundException(__('This action is not supported'));
        }

        if ($type === 'user_info') {
            $this->set('showUserInfo', true);
        }

        $data = $this->getRequest()->getData();
        $servicesData = [];
        if ($type === 'user_info') {
            $session = $this->getRequest()->getSession();
            $servicesData = $session->read('Services');
        } else {
            $servicesData = $data['Services'];
        }

        if (empty($servicesData)) {
            $servicesData = [];
        }

        $billingInfoData = !empty($data['service_billing_information']) ? $data['service_billing_information'] : [];

        if (!empty($billingInfoData['country_id'])) {
            $this->loadModel('Countries');
            $billingInfoData['country_name'] = $this->Countries->getCountryName($billingInfoData['country_id']);
        } else {
            $billingInfoData['country_name'] = '';
        }

        $startDate = '-';
        $expiryDate = '-';
        if (!empty($servicesData['start_date'])) {
            $startDate = date('m/d/Y', strtotime($servicesData['start_date']));
            $expiryDate = date('m/d/Y', strtotime($servicesData['start_date']) + (60 * 60 * 24 * 365));
        }

        $items = [];
        if (!empty($servicesData['version'])) {
            $versionPrice = $this->Services->calcPrice($servicesData, 'version');
            $versionUnitPrice = 0;
            if ($servicesData['version'] == ServicesTable::VERSION_PERM) {
                $versionUnitPrice = ServicesTable::VERSION_PERM_PRICE;
            } elseif ($servicesData['version'] == ServicesTable::VERSION_SAAS) {
                $versionUnitPrice = ServicesTable::VERSION_SAAS_PRICE;
            }
            $items[] = [
                'name' => ServicesTable::getTypes($servicesData['version']),
                'quantity' => 1,
                'unit_price' => $versionUnitPrice,
                'unit_price_friendly' => $this->getFriendlyPrice($versionUnitPrice),
                'vat' => 0,
                'vat_friendly' => __('No VAT'),
                'price' => $versionPrice,
                'price_friendly' => $this->getFriendlyPrice($versionPrice)
            ];
        }
        if (!empty($servicesData['online_trainings_hours'])) {
            $othPrice = $this->Services->calcPrice($servicesData, 'online_trainings');
            $othUnitPrice = ServicesTable::ONLINE_TRAININGS_HOUR_PRICE;
            $items[] = [
                'name' => __('Online Trainings and Assistance'),
                'quantity' => $servicesData['online_trainings_hours'],
                'unit_price' => $othUnitPrice,
                'unit_price_friendly' => $this->getFriendlyPrice($othUnitPrice),
                'vat' => 0,
                'vat_friendly' => __('No VAT'),
                'price' => $othPrice,
                'price_friendly' => $this->getFriendlyPrice($othPrice)
            ];
        }
        if (!empty($servicesData['onsite_workshops_days'])) {
            $owdPrice = $this->Services->calcPrice($servicesData, 'onsite_workshops');
            $owdUnitPrice = ServicesTable::ONSITE_WORKSHOPS_DAY_PRICE;
            $items[] = [
                'name' => __('Onsite Workshops'),
                'quantity' => $servicesData['onsite_workshops_days'],
                'unit_price' => $owdUnitPrice,
                'unit_price_friendly' => $this->getFriendlyPrice($owdUnitPrice),
                'vat' => 0,
                'vat_friendly' => __('No VAT'),
                'price' => $owdPrice,
                'price_friendly' => $this->getFriendlyPrice($owdPrice)
            ];
        }
        if (!empty($billingInfoData['payment_type'])) {
            $paymentPrice = 0;
            $paymentUnitPrice = 0;
            $paymentName = '';
            if ($billingInfoData['payment_type'] == ServiceBillingInformationsTable::PAYMENT_TYPE_CREDIT_CARD) {
                $paymentPrice = ServiceBillingInformationsTable::PAYMENT_PRICE_CREDIT_CARD;
                $paymentUnitPrice = $paymentPrice;
                $paymentName = __('Credit Card Fees');
            } elseif ($billingInfoData['payment_type'] == ServiceBillingInformationsTable::PAYMENT_TYPE_BANK_TRANSFER) {
                $paymentPrice = ServiceBillingInformationsTable::PAYMENT_PRICE_BANK_TRANSFER;
                $paymentUnitPrice = $paymentPrice;
                $paymentName = __('Bank Transfer Fees');
            }
            $items[] = [
                'name' => $paymentName,
                'quantity' => 1,
                'unit_price' => $paymentUnitPrice,
                'unit_price_friendly' => $this->getFriendlyPrice($paymentUnitPrice),
                'vat' => 0,
                'vat_friendly' => __('No VAT'),
                'price' => $paymentPrice,
                'price_friendly' => $this->getFriendlyPrice($paymentPrice)
            ];
        }

        $priceSubtotal = 0;
        $priceTotal = 0;
        foreach ($items as $item) {
            $priceSubtotal += $item['price'];
            $priceTotal += $item['price'] + $item['vat'];
        }
        $priceSubtotalFriendly = $this->getFriendlyPrice($priceSubtotal);
        $priceTotalFriendly = $this->getFriendlyPrice($priceTotal);

        $this->set(compact('startDate', 'expiryDate', 'billingInfoData', 'items', 'priceSubtotal', 'priceSubtotalFriendly', 'priceTotal', 'priceTotalFriendly'));
    }

    protected function getFriendlyPrice($price)
    {
        return Number::currency($price, 'EUR', ['places' => 0]);
    }

    public function processQuote()
    {
        $data = $this->getRequest()->getData();

        $this->checkMandatoryFields($data['Services']);

        $version = $data['Services']['version'];
        $startDate = $data['Services']['start_date'];
        $online_trainings_hours = $data['Services']['online_trainings_hours'];
        $onsite_workshops_days = $data['Services']['onsite_workshops_days'];

        $session = $this->getRequest()->getSession();
        $session->write([
            'Services.version' => $version,
            'Services.start_date' => $startDate,
            'Services.online_trainings_hours' => $online_trainings_hours,
            'Services.onsite_workshops_days' => $onsite_workshops_days
        ]);

        return $this->redirect([
            'controller' => 'Services',
            'action' => 'add'
        ]);
    }

    private function checkMandatoryFields($data)
    {
        $mandatoryFields = [
            'version' => 'notEmpty',
            'start_date' => 'notEmpty',
            'online_trainings_hours' => 'allowEmpty',
            'onsite_workshops_days' => 'allowEmpty'
        ];

        $allClear = true;
        foreach ($mandatoryFields as $key => $rule) {
            if (!array_key_exists($key, $data) ||
                ($rule === 'notEmpty' && empty($data[$key]))) {
                $allClear = false;
            }
        }

        if (!$allClear) {
            $this->Flash->error(__('You need to fill all mandatory fields in Paid Services section. If you already did it and you see this message, your session has probably expired. Please try again.'));
            return $this->redirect(['controller' => 'Services', 'action' => 'index']);
        }
    }

    protected function clearSessionData()
    {
        $session = $this->getRequest()->getSession();
        $sessionData = $session->read('Services');
        if (!empty($sessionData)) {
            foreach ($sessionData as $key => $val) {
                $session->delete('Services.' . $key);
            }
        }
    }
}
