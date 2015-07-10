<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VotesSingle Entity.
 */
class VotesSingle extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'person_id' => true,
        'votes_id' => true,
        'opinion' => true,
        'person' => true,
        'vote' => true,
    ];
}
