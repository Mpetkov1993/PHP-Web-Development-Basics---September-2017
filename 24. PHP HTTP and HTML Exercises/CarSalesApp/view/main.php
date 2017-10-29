<table>
    <th>Cars</th>
    <th>Customers</th>
    <th>Sales</th>
    <th colspan="<?php echo count($brand) ?>">Owners of</th>
    <tr>
        <td><a href="./index.php?input=cars">View</a>/<a href="./index.php?input=edit_car">Edit</a></td>
        <td><a href="./index.php?input=customers">View</a>/<a href="./index.php?input=edit_customer">Edit</a></td>
        <td><a href="./index.php?input=sales">View</a>/<a href="./index.php?input=add">Add</a>/<a href="./index.php?input=edit_sale">Edit</a></td>
        <?php foreach($brand as $i => $iv): ?>
            <td><a href="./index.php?input=owner&brand=<?php echo($iv['car_make']);?>"><?php echo($iv['car_make']);?></a></td>
        <?php endforeach; ?>
    </tr>
</table>