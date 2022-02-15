<html lang="en"><head>
    <meta charset="UTF-8">
    <title>World Game</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h1>Countries</h1>
<br>
<h2>My countries</h2>
<table>
    <tbody>
    <tr>
        <th>Code</th>
        <th>Name</th>
        <th>Population</th>
        <th>GNP</th>
        <th>NumLanguages</th>
        <th>NumCities</th>
        <th>Owner</th>
    </tr>
    <?php foreach ($mycountries as $pais){
     echo '<tr>';
     echo  '<td>'.$pais->code.'</td>';
     echo '<td>'.$pais->name.'</td>';
     echo  '<td>'.$pais->population.'</td>';
     echo  '<td>'.$pais->gnp.'</td>';
     echo   '<td>'.$pais->numLanguages.'</td>';
     echo   '<td>'.$pais->numcities.'</td>';
     echo   '<td>'.$pais->owner.'</td>';
    echo '</tr>';
    }?>
    </tbody>
</table>
<br>
<h2>Other countries</h2>
<table>
    <tbody>
    <tr>
        <th>Code</th>
        <th>Name</th>
        <th>Population</th>
        <th>GNP</th>
        <th>NumLanguages</th>
        <th>NumCities</th>
        <th>Owner</th>
    </tr>
    <?php foreach ($countries as $pais){
        echo '<tr>';
        echo  '<td>'.$pais->code.'</td>';
        echo '<td>'.$pais->name.'</td>';
        echo  '<td>'.$pais->population.'</td>';
        echo  '<td>'.$pais->gnp.'</td>';
        echo   '<td>'.$pais->numLanguages.'</td>';
        echo   '<td>'.$pais->numcities.'</td>';
        echo   '<td>'.$pais->owner.'</td>';
        echo   '<td><a href="?action=attack&amp;countryCode='.$pais->code.'">Attack</a></td>';
        echo '</tr>';
    }?>
    </tbody>
</table>
<span><a href="../Controlador/logoutControlador.php">Logout</a></span>
</body>
</html>