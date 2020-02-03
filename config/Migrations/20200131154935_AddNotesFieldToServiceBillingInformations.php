<?php
use Migrations\AbstractMigration;

class AddNotesFieldToServiceBillingInformations extends AbstractMigration
{
    /**
     * Change Method.
     * 
     * @return void
     */
    public function change()
    {
        $table = $this->table('service_billing_informations');
        $table->addColumn('notes', 'text', [
            'after' => 'payment_type',
            'default' => null,
            'null' => false,
        ]);
        $table->update();
    }
}
