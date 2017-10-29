<table>
    <th>Make</th>
    <th>Model</th>
    <th>Year</th>
    <?php foreach($cars as $i => $iv): ?>
        <tr>
            <td><?php echo($iv['car_make']);        ?></td>
            <td><?php echo($iv['car_model']);       ?></td>
            <td><?php echo($iv['car_year']);        ?></td>
        </tr>
    <?php endforeach; ?>
</table>