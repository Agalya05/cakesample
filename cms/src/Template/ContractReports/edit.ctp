<!-- File: src/Template/ContractReports/edit.ctp -->

<h1>Edit ContractReport</h1>
<?php
    echo $this->Form->create($contractreport);
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
    echo $this->Form->button(__('Save ContractReport'));
    echo $this->Form->end();
?>