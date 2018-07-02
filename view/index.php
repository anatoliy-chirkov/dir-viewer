<table>
    <tr>
        <th>Name</th>
        <th>Size</th>
        <th>Type</th>
        <th>Last modified</th>
    </tr>

    <?php foreach ($data as $item): ?>
        <tr>
            <td><?= $item['name'] ?></td>
            <td><?= $item['size'] ?></td>
            <td><?= $item['type'] ?></td>
            <td><?= $item['last_modified'] ?></td>
        </tr>
    <?php endforeach; ?>

</table>

<br>

<a href="?refresh=1">Обновить</a>