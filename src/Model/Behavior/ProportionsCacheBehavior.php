<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Entity;
use Cake\ORM\Table;
use Cake\Event\Event;
use Cake\ORM\Association;

/**
 * ProportionsCache behavior
 */
class ProportionsCacheBehavior extends Behavior
{
    use \Cake\Log\LogTrait;
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function afterSave(Event $event, Entity $entity)
    {
        $this->log("After save");
        $this->_processAssociations($event, $entity);
    }

    /**
    * afterDelete callback.
    *
    * Makes sure to update counter cache when a record is deleted.
    *
    * @param \Cake\Event\Event $event The afterDelete event that was fired.
    * @param \Cake\ORM\Entity $entity The entity that was deleted.
    * @return void
    */
    public function afterDelete(Event $event, Entity $entity)
    {
        $this->log("After Delete");
        $this->_processAssociations($event, $entity);
    }

    protected function _processAssociations(Event $event, Entity $entity){
        foreach($this->_config as $assoc => $settings){
            $assoc = $this->_table->association($assoc);
            $this->_processAssociation($event, $entity, $assoc, $settings);
        }
    }

    protected function _processAssociation(Event $event, Entity $entity, Association $assoc, $settings){
        // $this->log($event);
        // $this->log($entity);
        // $this->log($assoc);
        // $this->log($settings);
        $foreignKeys = (array)$assoc->foreignKey();
        $primaryKeys = (array)$assoc->target()->primaryKey();
        $countConditions = $entity->extract($foreignKeys);
        $updateConditions = array_combine($primaryKeys, $countConditions);

        // $this->log($updateConditions);
        foreach($settings as $field => $sourceFields){
            $assocTable =$assoc->target();
            $rows = $assocTable->find('all',
                ['fields' => $sourceFields, 'conditions'=>$updateConditions]);
            $data = $rows->toArray();
            $fieldValue = [$data[0]->{$sourceFields[0]}, $data[0]->{$sourceFields[1]}];
            $proportion = $this->_proportion($fieldValue[0], $fieldValue[1]);
            $this->log($proportion);
            $this->log($fieldValue);
            $assocTable->updateAll([$field => $proportion], $updateConditions);
        }
    }

    protected function _proportion($first, $second){
        if($second == 0)
            return 0;
        return $first / $second;
    }
}
