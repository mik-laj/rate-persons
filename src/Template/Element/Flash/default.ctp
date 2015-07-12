<?php
$class = 'alert';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
?>
<div class="alert-box <?= h($class) ?>">
    <div class="row">
        <div class="alert-inner"><?= h($message) ?></div>
    </div>
</div>
