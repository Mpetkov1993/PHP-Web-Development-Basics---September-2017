<table>
    <th>Make</th>
    <th>Model</th>
    <th>Year</th>
    <th>Car Id</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Customer Id</th>
    <?php foreach($owners as $i => $iv): ?>
        <tr>
            <td><?php echo($iv['car_make']);        ?></td>
            <td><?php echo($iv['car_model']);       ?></td>
            <td><?php echo($iv['car_year']);        ?></td>
            <td><?php echo($iv['car_id']);        ?></td>
            <td><?php echo($iv['first_name']);        ?></td>
            <td><?php echo($iv['last_name']);        ?></td>
            <td><?php echo($iv['customer_id']);        ?></td>
        </tr>
    <?php endforeach; ?>
</table>