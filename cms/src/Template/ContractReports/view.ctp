<!-- File: src/Template/ContractReports/view.ctp -->

<h1><?= h($contractreport->MerchantName) ?></h1>
<p><?= h($contractreport->Industry) ?></p>
<p><small>Created: <?= $contractreport->created->format(DATE_RFC850) ?></small></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $contractreport->contract_id]) ?></p>