<table>
    <thead>
        <th>Category:</th>
        <th>Win:</th>
        <th>Lost: </th>
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
                <td><?= $category['lost_count']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
