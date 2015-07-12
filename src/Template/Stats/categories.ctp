<table>
    <thead>
        <th>Category:</th>
        <th>Win:</th>
        <th>Lose: </th>
    </thead>
    <tbody>
        <?php foreach ($categories as $category ): ?>
            <tr>
                <td><?= $this->Html->link(
                    $category['name'],
                    ['controller' => 'Stats','action' => 'category',$category['slug']]
                    );?>
                </td>
                <td><?= $category['win_count']; ?></td>
                <td><?= $category['lose_count']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
