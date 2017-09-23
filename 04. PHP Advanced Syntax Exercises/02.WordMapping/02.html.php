<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coloring Texts</title>
    <style>
<?php include '02.css.css'; ?>
    </style>
</head>
<body>
<form class="form-style-4" action="" method="get">
    <label><h3 align="center">02.Word Mapping</h3></label>
    <label><p align="center">Write a PHP program that takes a text from a textarea and prints each word and the number of times it occurs in the text.</p></label>
    <hr><br>
    <label for="field1">
        <span><div align="center">Input</div></span><input type="text" name="input" required="true" <?php if (isset($_GET['send'])): ?>value="<?=$_GET['input']?>"<?php endif; ?>/>
    </label>
    <hr><br>
    <?php if (isset($output)): ?>
        <label for="field1">
            <div align="center">Output:</div><hr><?php foreach ($output as $word => $count) : ?>
            <table align="center">
                <tr>
                    <td><?=$word?> => </td>
                    <td><?=$count?></td>
                </tr>
            </table>
            <?php endforeach; ?>
        </label>
    <?php endif; ?>
    <br><hr><br>
    <label>
        <span>&nbsp;</span><input type="submit" name="send" value="Count Words" />
    </label>
</form>
</body>
</html>