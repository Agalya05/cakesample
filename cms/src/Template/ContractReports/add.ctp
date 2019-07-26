<h1>Add ContractReport</h1>
<?php
    echo $this->Form->create($contractreport);
    // Hard code the user for now.
    echo $this->Form->control('contract_id');
    echo $this->Form->control('merchant_id', ['type' => 'text']);
    echo $this->Form->control('MerchantName');
    echo $this->Form->control('Industry');
    echo $this->Form->control('Address', ['rows' => '1']);
    echo $this->Form->control('City');
    echo $this->Form->control('State');
    echo $this->Form->control('Zip');
    echo $this->Form->control('Country');
    echo $this->Form->control('Amount');
    echo $this->Form->control('contract_status');
    echo $this->Form->control('contract_type');
    echo $this->Form->control('created');
    echo $this->Form->button(__('Save Contract Report'));
    echo $this->Form->end();
?>