<table>
	<th>Make</th>
	<th>Model</th>
	<th>Year</th>
	<th>Date & Time</th>
    <th>Amount</th>
	<?php foreach($sales as $i => $iv): ?>
		<tr>		 
			<td><?php echo($iv['car_make']);        ?></td>
			<td><?php echo($iv['car_model']);       ?></td>
			<td><?php echo($iv['car_year']);        ?></td>
			<td><?php echo($iv['sale_date']);?></td>
            <td><?php echo($iv['amount']); ?></td>
		</tr>
	<?php endforeach; ?>
    <tr>
        <td class="caa" colspan="4">Total:</td>
        <td><?php echo($sales_total); ?></td>
    </tr>
</table>