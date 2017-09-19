<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calculate Two Numbers</title>
</head>
<body>
<form method="get">
    <div align="center">
        <p>Operation:</p>
        <select name="operation">
            <option value="sum">Sum</option>
            <option value="subtract">Subtract</option>
        </select>
    </div>
    <div align="center">
        <p>First Number:</p>
        <input type="text" name="fNum"/>
    </div>
    <div align="center">
        <p>Second Number:</p>
        <input type="text" name="sNum"/>
    </div>
    <?php if (isset($result)):?>
    <div align="center">
        <p>Result:</p>
        <input type="text" disabled="disabled" name="sNum" value="<?= $result; ?>"/>
    </div>
    <?php endif; ?> <br>
    <div align="center">
        <span></span><input type="submit" name="send" value="Submit">
    </div>
</form>
</body>
</html>