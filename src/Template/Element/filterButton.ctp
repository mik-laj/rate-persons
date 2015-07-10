<?=$this->Form->create(null, ['url'=>['controller' => 'Vote', 'action' => 'changeSexFilter']])?>
<?=$this->Form->submit($text, ['class' => 'button'] )?>
<?=$this->Form->hidden('filter',['name'=>'filter','value'=> $value])?>
<?=$this->Form->end() ?>
