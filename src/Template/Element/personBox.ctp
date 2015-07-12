<div class="person-box">
    <div class="person-box--image">
        <?= $this->Html->image($person->picture_url) ?>
    </div>
    <div class="person-box--content">
        <h3 class="person-box--name">
            <span class="stats-list--position"></span>
            <?= $person->name; ?>
        </h3>
        <p>
            <span class="person-box--label">Win:</span>
            <?= $person->win_count; ?>
        </p>
        <p>
            <span class="person-box--label">Lose:</span>
            <?= $person->lost_count; ?>
        </p>
        <p>
            <span class="person-box--label">Score:</span>
            <?= $person->score; ?>
        </p>
        <p>
            <span class="person-box--label">Category:</span>
            <?= $this->Html->link($person->category->name, ['controller'=>'Stats', 'action'=>'category', $person->category->slug]) ?>
        </p>
    </div>
</div>
