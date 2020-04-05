<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    //127.0.0.1:3306
    $fd = fopen("text.odt", "w");
    include "no_push.php";
    $connect = mysqli_connect($host, $user, $password, $db);
    if (!$connect) die("Ошибка соединения");
    print("Соединение установлено\n");
    if (!mysqli_select_db($connect, $db)) die("Ошибка выбора БД");
    print("БД выбрана успешно\n");
    $qresult = mysqli_query($connect, "SELECT * FROM table_work");
    if (!$qresult) die("Ошибка выбора таблицы");
    // Создание шапки
    fwrite($fd, "
    <link rel=\"stylesheet\" href=\"style.css\">
<style>
pre{
font-family: 'Arial';
font-size: 12pt;
}</style>
<center><b><h4>Заявка на сдачу СИ юридическими лицами</b></h4><br></center>
<pre>Номер счета (в случае предварительно оформленного счета)
Наименование предприятия
(полное и краткое)     ЗАО \"Кетон\"
ИНН   5259024343
Номер договора
Контактные данные (ФИО,должность,телефон)   9524745504
Маляревский Артем Константинович    гл.Механик</pre>
");
    fwrite($fd, "<table>
<tr>
    <td>Наименование Си</td>
    <td>Тип СИ</td>
    <td>Предел измерений</td>
    <td>Заводиской номер</td>
    <td>Год выпуска</td>
    <td>Кол-во</td>
    <td>Эталонные СИ</td>
    <td>Рабочие СИ</td>
    <td>Сфера ГРОЕИ</td>
</tr>


    ");
    while ($elem = mysqli_fetch_assoc($qresult)) {
        if ($elem["mouth"] == date("n") ) {
            fwrite($fd, "<tr><td>{$elem["type_dev"]}</td>
                        <td>{$elem["mark_dev"]}</td>
                        <td></td>
                        <td>{$elem["serial_num"]}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        </tr>");

        }
    }
    fwrite($fd, "
    </table>
    через (2) системный вызов");
    print("Отправить в поверку\n");
    fclose($fd);
    ?>

<p></p>

</body>
</html>