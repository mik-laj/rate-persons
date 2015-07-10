<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Person Entity.
 */
class Person extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'slug' => true,
        'sex' => true,
        'picture_url' => true,
        'link' => true,
        'html' => true,
        'category_id' => true,
        'category' => true,
        'votes_single' => true,
        'win_count' => true,
        'lost_count' => true,
        'score' => true,
    ];

    public function _getScore(){
        $win = $this->_properties['win_count'];
        $lost = $this->_properties['lost_count'];
        if($lost ===0)
            return "0%";
        return  round(($win / $lost)*100, 2) . "%";
    }
}
