<form method="get">
    <input type="hidden" name="input" value="add">
    <table>
        <th>Car Details</th>
        <th>Customer Details</th>
        <th>Sale Details</th>
        <tr>
            <td><input type="number" name="car_year" placeholder="Year"></td>
            <td><input type="number" name="age" placeholder="Age"></td>
            <td><input type="number" name="amount" placeholder="Amount"></td>
        </tr>
        <tr><td><input type="text" name="car_make" placeholder="Brand"></td>
            <td><input type="text" name="first_name" placeholder="First Name"></td>
            <td><input type="text" name="currency" disabled="disabled" placeholder="BGN"></td>
        </tr>
        <tr>
            <td><input type="text" name="car_model" placeholder="Model"></td>
            <td><input type="text" name="last_name" placeholder="Last Name"></td>
            <td><input type="submit" value=" Sell " name="submit"/></td>
        </tr>
    </table>
</form>