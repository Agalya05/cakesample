<!-- File: src/Template/contractreports/index.ctp -->

<h1>Contract Reports</h1>
<?= $this->Html->link('Add contractreport', ['action' => 'add']) ?>
<p><?= $this->Html->link("Export contractreport", ['action' => 'export']) ?></p>
<table>
    <tr>
        <th>contract_id</th>
        <th>merchant_id</th>
        <th>MerchantName</th>
        <th>Industry</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>Zip</th>
        <th>Country</th>
        <th>Amount</th>
        <th>contract_status</th>
        <th>contract_type</th>
        <th>created</th>
    </tr>

    <!-- Here is where we iterate through our $contractreports query object, printing out contractreport info -->

    <?php foreach ($contractreports as $contractreport): ?>
    <tr>
        <td>
            <?= $contractreport->contract_id       ?> </td>
        <td>
            <?= $contractreport->merchant_id       ?> </td>
        <td>
            <?= $this->Html->link($contractreport->MerchantName, ['action' => 'view', $contractreport->contract_id]) ?> </td>
        <td>
            <?= $contractreport->Industry       ?> </td>
        <td>
            <?= $contractreport->Address       ?> </td>
        <td>
            <?= $contractreport->City       ?> </td>
        <td>
            <?= $contractreport->State       ?> </td>
        <td>
            <?= $contractreport->Zip       ?> </td>
        <td>
            <?= $contractreport->Country       ?> </td>
        <td>
            <?= $contractreport->Amount       ?> </td>
        <td>
            <?= $contractreport->contract_status       ?> </td>
        <td>
            <?= $contractreport->contract_type ?></td>
        <td>
             <?= $contractreport->created->format(DATE_RFC850) ?> </td>
    </tr>
    <?php endforeach; ?>
</table>

<h1>contractreports</h1>
<p><?= $this->Html->link("Add contractreport", ['action' => 'add']) ?></p>
<p><?= $this->Html->link("Export contractreport", ['action' => 'export']) ?></p>

<table>
    <tr>
        <th>contract_id</th>
        <th>MerchantName</th>
        <th>Industry</th>
        <th>created</th>
    </tr>

<!-- Here's where we iterate through our $contractreports query object, printing out contractreport info -->

<?php foreach ($contractreports as $contractreport): ?>
    <tr>
        <td>
            <?= $contractreport->contract_id       ?> </td>
        <td>
            <?= $this->Html->link($contractreport->MerchantName, ['action' => 'view', $contractreport->contract_id]) ?> </td>
        <td>
            <?= $contractreport->Industry       ?> </td>
                <td>
             <?= $contractreport->created->format(DATE_RFC850) ?> </td>
        <td>
            <?= $this->Html->link('Edit', ['action' => 'edit', $contractreport->contract_id]) ?>
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $contractreport->contract_id],
                ['confirm' => 'Are you sure?'])
            ?>
        </td>
    </tr>
<?php endforeach; ?>

</table>