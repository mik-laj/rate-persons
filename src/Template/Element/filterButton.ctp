<?=$this->Form->create(null, ['url'=>['controller' => 'Vote', 'action' => 'changeSexFilter']])?>
<?php
$iconHtml = '';
if($icon){
    $iconHtml = '<i class="fa fa-'.$icon.'"></i> ';
}
if($value===$filter):?>
    <?=$this->Form->button($iconHtml.$text, ['type' => 'submit', 'class' => 'button success', 'escape' => false])?>
<?php else: ?>
    <?=$this->Form->button($iconHtml.$text, ['type' => 'submit', 'class' => 'button', 'escape' => false] )?>
<?php endif;?>
<?=$this->Form->hidden('filter',['name' => 'filter', 'value' => $value])?>
<?=$this->Form->end() ?>
