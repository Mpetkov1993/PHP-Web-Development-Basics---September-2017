<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Render Students Info</title>
</head>
<body>
<form method="get">
    <div align="center">
        <p>Delimiter:</p>
        <select name="delimiter">
            <option value=",">,</option>
            <option value="|">|</option>
            <option value="&">&</option>
        </select>
    </div>
    <div align="center">
        <p>Name:</p>
        <input type="text" name="names"/>
    </div>
    <div align="center">
        <p>Age:</p>
        <input type="text" name="ages"/>
    </div>
    <?php if (isset($result)):?>
        <div align="center">
            <p>Result:</p>
            <table border="1">
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                </tr>
                <?php foreach ($result as $key => $value): ?>
                    <tr>
                        <td><?= $key; ?></td>
                        <td><?= $value; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php endif; ?> <br>
    <div align="center">
        <span></span><input type="submit" name="send" value="Filter">
    </div>
</form>
</body>
</html>