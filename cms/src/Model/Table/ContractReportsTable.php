<?php
// src/Model/Table/ContractReportsTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class ContractReportsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
}
