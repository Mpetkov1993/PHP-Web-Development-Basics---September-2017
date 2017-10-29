<table>
    <th>First Name</th>
    <th>Last Name</th>
    <?php foreach($customers as $i => $iv): ?>
        <tr>
            <td><?php echo($iv['first_name']); ?></td>
            <td><?php echo($iv['last_name']); ?></td>
        </tr>
    <?php endforeach; ?>
</table>