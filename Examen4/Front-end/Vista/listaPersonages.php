<html lang="en"><head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        a{
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>
<form method="get">
    <select name="personage">
        <?php foreach ($characters as $char) { ?>
        <option value="<?php echo $char->id ?>"><?php echo $char->name ?></option>
        <?php } ?>
    </select>
    <select name="localizacion">
        <?php foreach ($episodes as $epi) { ?>
            <option value="<?php echo $epi->id ?>"><?php echo $epi->name ?></option>
        <?php } ?>
    </select>
    <button type="submit">Cambiar Localizacion</button>
</form>
<button><a href="../Controlador/logoutControlador.php">LogOut</a></button>
<?php foreach ($characters as $char){ ?>
<ul>
    <?php echo $char->name ?>
    <ul>
        <li>Status: <?php echo $char->status ?></li>
        <li>Species: <?php echo $char->species ?></li>
        <li>Type: <?php echo $char->type ?></li>
        <li>Gender: <?php echo $char->gender ?></li>
        <li>Origin: <?php echo $char->origin ?></li>
        <li>Location: <?php echo $char->location ?></li>
        <li>Created: <?php echo $char->created ?></li>
        <ul>
            Episodios:
        <?php foreach ($char->episodios as $epi) {?>
            <li><?php echo $epi->name ?></li>
        <?php } ?>
        </ul>
    </ul>
</ul>
<?php } ?>
</body></html>
