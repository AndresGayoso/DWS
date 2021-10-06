<html lang="es">
<head>
    <title>Christmas Tree</title>
</head>
<body>
<form method="post" action="CristmasTree.php">
    <label>
        Number:
        <input type="text" name="num"/>
    </label>
    <input type="submit"/>
</form>
<div>
    <?php
    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);

    }
    ?>
</div>
</body>
</html>