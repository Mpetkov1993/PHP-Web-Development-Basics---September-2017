<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coloring Texts</title>
    <style>
<?php include '04.css.css'; ?>
    </style>
</head>
<body>
<form class="form-style-4" action="" method="get">
    <label><h3 align="center">04.Coloring Texts</h3></label>
    <label><p align="center">Write a PHP program that takes a text and colors each character according to its ASCII value.</p></label>
    <br><hr><br><br>
    <label for="field1">
        <span><div align="center">Input</div></span><input type="text" name="input" required="true" <?php if (isset($_GET['send'])): ?>value="<?=$_GET['input']?>"<?php endif; ?>/>
    </label>
    <br><hr><br>
    <?php if (isset($output)): ?>
        <label for="field1">
            <span><div align="center">Output</div></span><h4><?= $output; ?></h4>
        </label>
    <?php endif; ?>
    <br><hr><br>
    <label>
        <span>&nbsp;</span><input type="submit" name="send" value="Submit" />
    </label>
</form>
</body>
</html>