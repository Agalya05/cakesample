<?php

namespace App\Controller;
use App\Controller\AppController;
class ContractReportsController extends AppController
{
	public $name = 'ContractReports';

   public $components = array(
        'Export'
    );
	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }
	public function index()
	{
		$this->loadComponent('Paginator');
        $contractreports = $this->Paginator->paginate($this->ContractReports->find());
        $this->set(compact('contractreports'));
	}
    public function view($contract_id=null)
    {
        $contractreport = $this->ContractReports->findByContractId($contract_id)->first();
        $this->set(compact('contractreport'));
    }
    public function export()
    {
        $data = $this->ContractReports->find();
        $dateTime = date('m/d/Y h:i:s a', time());;
        $filename='contractreport'.$dateTime.'.csv';
        $this->Export->exportCsv($data, $filename);
        $this->Flash->success(__('The Report has been exported successfully.', $contractreport->MerchantName));
        return $this->redirect(['action' => 'index']);
    }    

    public function add()
    {
        $contractreport = $this->ContractReports->newEntity();
        if ($this->request->is('post')) {
            $contractreport = $this->ContractReports->patchEntity($contractreport, $this->request->getData());
            if ($this->ContractReports->save($contractreport)) {
                $this->Flash->success(__('Your Contract has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add the Contract.'));
        }
        $this->set('contractreport', $contractreport);
    }

    public function edit($contract_id)
	{
	    $contractreport = $this->ContractReports->findByContractId($contract_id)->firstOrFail();
	    if ($this->request->is(['post', 'put'])) {
	        $this->ContractReports->patchEntity($contractreport, $this->request->getData());
	        if ($this->ContractReports->save($contractreport)) {
	            $this->Flash->success(__('Your contractreport has been updated.'));
	            return $this->redirect(['action' => 'index']);
	        }
	        $this->Flash->error(__('Unable to update your contractreport.'));
	    }
	    $this->set('contractreport', $contractreport);
	}

    public function delete($contract_id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $contractreport = $this->ContractReports->findByContractId($contract_id)->firstOrFail();
        if ($this->ContractReports->delete($contractreport)) {
            $this->Flash->success(__('The {0} article has been deleted.', $contractreport->MerchantName));
            return $this->redirect(['action' => 'index']);
        }
    }

}