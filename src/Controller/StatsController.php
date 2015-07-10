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
    public function initialize(){
        $this->modelClass="";
        $this->loadModel("Persons");
    }
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {

    }

    public function categories(){
        $query = $this->Persons->find('all', ['contain' => 'Categories']);
        $categories = $query->select(
            [
                'Categories.name',
                'Categories.slug',
                'win_count' => $query->func()->sum('Persons.win_count'),
                'lost_count' => $query->func()->sum('Persons.lost_count')
            ])
            ->group('Categories.id')->all()->map(function($row, $key){
                // var_dump(func_get_args());
                return [
                    'name' => $row->category->name,
                    'slug' => $row->category->slug,
                    'win_count' => $row->win_count,
                    'lost_count' => $row->lost_count
                ];
            });
        $this->set('categories', $categories);
    }
    public function category($slug){
        $persons = $this->Persons->find('all', ['contain' => ['Categories']]);
        $persons->matching('Categories', function($q) use($slug){
            return $q->where(['Categories.slug'=> $slug ]);
        });
        $this->set('persons', $persons);
    }
}
