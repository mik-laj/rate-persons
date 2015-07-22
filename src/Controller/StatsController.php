<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Stats Controller
 *
 * @property \App\Model\Table\StatsTable $Stats
 */
class StatsController extends AppController
{
    // var $modelClass = "Persons";
    var $components = [];
    var $uses = array();
    public $paginate = [
        'limit' => 24,
        'order' => [
            'Persons.score' => 'desc'
        ]
    ];
    public function initialize(){
        parent::initialize();
        $this->modelClass="";
        $this->loadModel("Persons");
        $this->loadModel("Categories");
        $this->loadComponent('Paginator');

        $this->Auth->allow();
    }
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $persons = $this->Persons->find('all', ['contain' => 'Categories']);
        $this->set('persons', $this->paginate($persons));
    }

    public function categories(){
        $categories = $this->Categories->find('summary');
        $this->set('categories', $categories);
    }
    public function category($slug){
        $persons = $this->Persons->find('all', ['contain' => ['Categories']]);
        $persons->matching('Categories', function($q) use($slug){
            return $q->where(['Categories.slug'=> $slug ]);
        });
        $this->set('persons', $this->paginate($persons));
    }
}
