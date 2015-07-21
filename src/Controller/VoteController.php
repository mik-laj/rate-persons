<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vote Controller
 *
 * @property \App\Model\Table\VoteTable $Vote
 */
class VoteController extends AppController
{

    public function initialize(){
        parent::initialize();
        $this->loadModel('VotesSingle');
        $this->loadModel('Persons');
        $this->loadModel('Votes');
        $this->loadModel('Categories');
        $this->loadComponent('Csrf');
        $this->loadComponent('Flash');
        $this->Auth->allow();
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $session = $this->request->session();
        // $this->Flash->error(__(' The vote could not be saved. Please, try again.'));
        $filter = $session->read('filter');
        $filter = $filter ? $filter : 'all';
        if($session->check('random_persons')){
            $ids = $session->read('random_persons');
            $persons = $this->Persons->find('all', ['conditions' => ["id IN"=> $ids], 'limit'=>2]);
        } else{
            $persons = $this->_getRandom($filter);
            if($persons){
                $session->write('random_persons', $persons->extract('id')->toArray());
            }
        }
        $this->set(compact('persons', 'filter'));

    }

    public function changeSexFilter(){
        if($this->request->is('post')){
            $session = $this->request->session();

            $filter = $this->request->data('filter');
            $old_filter = $session->read('filter');
            if($old_filter !== $filter){
                if(in_array($filter, ['male', 'female', 'all'])){
                    $this->request->session()->write('filter', $filter);
                    $this->request->session()->delete('random_persons');
                }else{
                    $this->Flash->error(__('The filter hasn\'t been saved.'));
                }
            }
        }
        return $this->redirect(['action' => 'index']);
    }

    public function vote(){
        $session = $this->request->session();
        if ($this->request->is('post') && $session->check('random_persons')) {
            $ids = $session->read('random_persons');
            $persons = $this->Persons->find('all', ['conditions' => ["id IN"=> $ids], 'limit'=>2]);

            $selection = $this->request->param('selection');

            $ip = $this->request->clientIp();

            if($this->_saveVote($ip, $persons->toArray(), $selection)){
                $this->Flash->success(__('The vote has been saved.'));
            }else{
                $this->Flash->error(__('Unable save the vote'));
            }
            $session->delete('random_persons');
        }
        return $this->redirect(['action' => 'index']);
    }

    private function _saveVote($ip, $persons, $selection){
                    // get selection options
        $vote = $this->Votes->newEntity(['ip' => $ip]);
        if(!$this->Votes->save($vote))
            return false;

        if($selection === '0'){
            $winner = $persons[0];
            $loser = $persons[1];
        }else{
            $winner = $persons[1];
            $loser = $persons[0];
        }
        $singleVotes = $this->VotesSingle->newEntities(
            [
                ['votes_id' => $vote->id, 'opinion' => true, 'person_id' => $winner['id']],
                ['votes_id' => $vote->id, 'opinion' => false, 'person_id' => $loser['id']],
            ]);
        foreach($singleVotes as $vote){
            if(!$this->VotesSingle->save($vote))
                return false;
        }
        return true;
    }

    private function _getRandom($filter){
        $query = $this->Persons->find('random',[
                'limit' => 2,
                'contain' => ['Categories'],
            ]);
        switch($filter){
            case 'male':
                $query->where(['sex' => 'm']);
                break;
            case 'female':
                $query->where(['sex' => 'K']);
                break;
            default:
                // No filter
                break;
        }
        return $query->all();
    }

}
