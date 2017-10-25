<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MentalBanks Controller
 *
 * @property \App\Model\Table\MentalBanksTable $MentalBanks
 *
 * @method \App\Model\Entity\MentalBank[] paginate($object = null, array $settings = [])
 */
class MentalBanksController extends AppController
{
    
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow('view');
    }

    /**
     * View method
     *
     * @param string|null $id Mental Bank id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view()
    {
        $user = $this->Auth->user();
        if ($user) {
            $mentalBank = $this->MentalBanks->find('all')
            ->where(['MentalBanks.user_id' => $user['id']])
            ->first();
            
            if ($mentalBank) {
                $this->set('mentalBank', $mentalBank);
                $this->set('_serialize', ['mentalBank']);
            } else {
                $this->redirect(['controller' => 'Contracts', 'action' => 'wizard']);
            }
        } else {
            $this->render('/Pages/intro');
        }
    }

    /**
     * Add method       
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mentalBank = $this->MentalBanks->newEntity();
        if ($this->request->is('post')) {
            $mentalBank = $this->MentalBanks->patchEntity($mentalBank, $this->request->getData());
            if ($this->MentalBanks->save($mentalBank)) {
                $this->Flash->success(__('The mental bank has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mental bank could not be saved. Please, try again.'));
        }
        $contracts = $this->MentalBanks->Contracts->find('list', ['limit' => 200]);
        $users = $this->MentalBanks->Users->find('list', ['limit' => 200]);
        $this->set(compact('mentalBank', 'contracts', 'users'));
        $this->set('_serialize', ['mentalBank']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Mental Bank id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mentalBank = $this->MentalBanks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mentalBank = $this->MentalBanks->patchEntity($mentalBank, $this->request->getData());
            if ($this->MentalBanks->save($mentalBank)) {
                $this->Flash->success(__('The mental bank has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mental bank could not be saved. Please, try again.'));
        }
        $contracts = $this->MentalBanks->Contracts->find('list', ['limit' => 200]);
        $users = $this->MentalBanks->Users->find('list', ['limit' => 200]);
        $this->set(compact('mentalBank', 'contracts', 'users'));
        $this->set('_serialize', ['mentalBank']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Mental Bank id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mentalBank = $this->MentalBanks->get($id);
        if ($this->MentalBanks->delete($mentalBank)) {
            $this->Flash->success(__('The mental bank has been deleted.'));
        } else {
            $this->Flash->error(__('The mental bank could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
