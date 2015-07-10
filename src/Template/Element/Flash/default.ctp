<?php
$class = 'alert';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
?>
<div class="alert">
    <div class="row">
        <div class="<?= h($class) ?>"><?= h($message) ?></div>
    </div>
</div>
