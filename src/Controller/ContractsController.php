<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Form\WizardForm;

/**
 * Contracts Controller
 *
 * @property \App\Model\Table\ContractsTable $Contracts
 *
 * @method \App\Model\Entity\Contract[] paginate($object = null, array $settings = [])
 */
class ContractsController extends AppController
{
    
    public function wizard()
    {
        $wizard = new WizardForm();
        if ($this->request->is('post')) {
            if ($wizard->execute($this->request->getData())) {
                $this->redirect(['action' => 'add', $this->request->data('income')]);
            } else {
                $this->Flash->error('There was an error in the form.');
            }
        }
        $this->set('wizard', $wizard);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'MentalBanks']
        ];
        $contracts = $this->paginate($this->Contracts);

        $this->set(compact('contracts'));
        $this->set('_serialize', ['contracts']);
    }

    /**
     * View method
     *
     * @param string|null $id Contract id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contract = $this->Contracts->get($id, [
            'contain' => ['Users', 'MentalBanks', 'ValueEvents']
        ]);

        $this->set('contract', $contract);
        $this->set('_serialize', ['contract']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($income = null)
    {
        $contract = $this->Contracts->newEntity();
        $contract->goal = floatval(ltrim($income, '$')) * 2;
        if ($this->request->is('post')) {
            $contract = $this->Contracts->patchEntity($contract, $this->request->getData());
            if ($this->Contracts->save($contract)) {
                $this->Flash->success(__('The contract has been saved.'));

                return $this->redirect(['action' => 'view', 'id' => $contract->id]);
            }
            $this->Flash->error(__('The contract could not be saved. Please, try again.'));
        }
        $users = $this->Contracts->Users->find('list', ['limit' => 200]);
        $mentalBanks = $this->Contracts->MentalBanks->find('list', ['limit' => 200]);
        $this->set(compact('contract', 'users', 'mentalBanks'));
        $this->set('_serialize', ['contract']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contract id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contract = $this->Contracts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contract = $this->Contracts->patchEntity($contract, $this->request->getData());
            if ($this->Contracts->save($contract)) {
                $this->Flash->success(__('The contract has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contract could not be saved. Please, try again.'));
        }
        $users = $this->Contracts->Users->find('list', ['limit' => 200]);
        $mentalBanks = $this->Contracts->MentalBanks->find('list', ['limit' => 200]);
        $this->set(compact('contract', 'users', 'mentalBanks'));
        $this->set('_serialize', ['contract']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contract id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contract = $this->Contracts->get($id);
        if ($this->Contracts->delete($contract)) {
            $this->Flash->success(__('The contract has been deleted.'));
        } else {
            $this->Flash->error(__('The contract could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
