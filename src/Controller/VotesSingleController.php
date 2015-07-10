<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VotesSingle Controller
 *
 * @property \App\Model\Table\VotesSingleTable $VotesSingle
 */
class VotesSingleController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Persons', 'Votes']
        ];
        $this->set('votesSingle', $this->paginate($this->VotesSingle));
        $this->set('_serialize', ['votesSingle']);
    }

    /**
     * View method
     *
     * @param string|null $id Votes Single id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $votesSingle = $this->VotesSingle->get($id, [
            'contain' => ['Persons', 'Votes']
        ]);
        $this->set('votesSingle', $votesSingle);
        $this->set('_serialize', ['votesSingle']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $votesSingle = $this->VotesSingle->newEntity();
        if ($this->request->is('post')) {
            $votesSingle = $this->VotesSingle->patchEntity($votesSingle, $this->request->data);
            if ($this->VotesSingle->save($votesSingle)) {
                $this->Flash->success(__('The votes single has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The votes single could not be saved. Please, try again.'));
            }
        }
        $persons = $this->VotesSingle->Persons->find('list', ['limit' => 200]);
        $votes = $this->VotesSingle->Votes->find('list', ['limit' => 200]);
        $this->set(compact('votesSingle', 'persons', 'votes'));
        $this->set('_serialize', ['votesSingle']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Votes Single id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $votesSingle = $this->VotesSingle->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $votesSingle = $this->VotesSingle->patchEntity($votesSingle, $this->request->data);
            if ($this->VotesSingle->save($votesSingle)) {
                $this->Flash->success(__('The votes single has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The votes single could not be saved. Please, try again.'));
            }
        }
        $persons = $this->VotesSingle->Persons->find('list', ['limit' => 200]);
        $votes = $this->VotesSingle->Votes->find('list', ['limit' => 200]);
        $this->set(compact('votesSingle', 'persons', 'votes'));
        $this->set('_serialize', ['votesSingle']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Votes Single id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $votesSingle = $this->VotesSingle->get($id);
        if ($this->VotesSingle->delete($votesSingle)) {
            $this->Flash->success(__('The votes single has been deleted.'));
        } else {
            $this->Flash->error(__('The votes single could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
