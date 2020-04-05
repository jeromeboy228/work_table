<html lang="en">

<head>
<script src="sup.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ввод данных для таблицы</title>
</head>

<body>


    <form action="for_db.php" method="post"><br>
      Тип оборудования  <input style="margin-left: 50px" type="text" name="type_dev" ><br>
      Марка оборудования  <input style="margin-left: 32px" type="text" name="mark_dev"><br>
      Серийный номер  <input style="margin-left: 57px" type="text" name="serial_num"><br>
      Срок поверки  <input max="12" style="margin-left: 79px" type="number" name="mounth"><br>
      Примечание  <input style="margin-left: 89px" type="text" name="exet"><br>
      <input type="submit" value="Отправить">
    </form>
</body>

</html>