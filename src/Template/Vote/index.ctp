
<ul class="button-group round even-3">
    <li><?= $this->element('filterButton', ['icon'=>'fa fa-venus', 'text'=>'male','value'=>'male'])?> </li>
    <li><?= $this->element('filterButton', ['icon'=>'fa fa-mars', 'text'=>'female','value'=>'female'])?></li>
    <li><?= $this->element('filterButton', ['icon'=>'fa fa-venus-mars', 'text'=>'all','value'=>'all'])?></li>
</ul>
<?php $persons = $persons->toArray() ?>
<div class="large-offset-1 large-4 columns">
    <?= $this->element('voteBox', ['selection' => 0, 'person' => $persons[0] ]); ?>
</div>
<div class="large-offset-2 large-4 columns end">
    <?= $this->element('voteBox', ['selection' => 1, 'person' => $persons[1] ]); ?>
</div>
