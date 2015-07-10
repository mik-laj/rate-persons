<table>
    <thead>
        <th>Person:</th>
        <th>Win:</th>
        <th>Lost: </th>
        <th>Score: </th>
    </thead>
    <tbody>
        <?php foreach ($persons as $person ): ?>
            <tr>
                <td><?= $person->name; ?></td>
                <td><?= $person->win_count; ?></td>
                <td><?= $person->lost_count; ?></td>
                <td><?= $person->score; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
