
<ul class="button-group round even-3">
    <li><?= $this->element('filterButton', ['text'=>'male','value'=>'male'])?> </li>
    <li><?= $this->element('filterButton', ['text'=>'female','value'=>'female'])?></li>
    <li><?= $this->element('filterButton', ['text'=>'all','value'=>'all'])?></li>
</ul>
<?php $persons = $persons->toArray() ?>
<div class="large-6 columns">
    <?= $this->element('voteBox', ['selection' => 0, 'person' => $persons[0] ]); ?>
</div>
<div class="large-6 columns">
    <?= $this->element('voteBox', ['selection' => 1, 'person' => $persons[1] ]); ?>
</div>
