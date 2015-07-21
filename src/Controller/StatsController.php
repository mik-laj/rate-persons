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
        $query = $this->Persons->find('all', ['contain' => 'Categories']);
        $categories = $query->select(
            [
                'Categories.name',
                'Categories.slug',
                'win_count' => $query->func()->sum('Persons.win_count'),
                'lose_count' => $query->func()->sum('Persons.lose_count')
            ])
            ->group('Categories.id')->all()->map(function($row, $key){
                // var_dump(func_get_args());
                return [
                    'name' => $row->category->name,
                    'slug' => $row->category->slug,
                    'win_count' => $row->win_count,
                    'lose_count' => $row->lose_count
                ];
            });
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
