


<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Таблица прборов</title>
</head>

<body>
    <table border="1px">
        <tr>
            <td>Номер</td>
            <td>Тип прибора</td>
            <td>Марка прибора</td>
            <td>Серийный номер</td>
            <td>Месяц поверки</td>
            <td>Прочее</td>
            <?php
include "no_push.php";
        $date=date("n");
           
            $connect = mysqli_connect($host, $user, $password, $db);
            if (!$connect) die("Ошибка подключения");

           /*  print("Подключение прошло успешно"); */
            $select = !mysqli_select_db($connect, "table_work");
            if (!$select)
                die("Ошибка выбора базы данных");
            /* print("База данных успешно выбрана"); */
            $qresult = mysqli_query($connect, "SELECT * FROM table_work");
            if (!$qresult) die("Проблема выбора таблицы");
            /* print("Все ок(1)"); */
            while ($elem = mysqli_fetch_assoc($qresult)) { ?>
        
        <tr <?php if($elem["mouth"]==$date) print("<div class=\"new\"</div"); ?>>
        <td><?php print("{$elem["id"]}") ?></td>
        <td><?php print("{$elem["type_dev"]}") ?></td>
        <td><?php print("{$elem["mark_dev"]}") ?></td>
        <td><?php print("{$elem["serial_num"]}") ?></td>
        <td ><?php print("{$elem["mouth"]}") ?></td>
        <td> <?php print("{$elem["exet"]}") ?></td>
        </tr>





    <?php }

    
    ?>
    </tr>
    </table>
    
</body>

</html>