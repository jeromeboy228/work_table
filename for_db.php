<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма отправки</title>
</head>
<body>
    <?php 
    $type_dev=$_POST["type_dev"];
    $mark_dev=$_POST["mark_dev"];
    $serial_num=$_POST["serial_num"];
    $mounth=$_POST["mounth"];
    $exet=$_POST["exet"];
    // проверка на ввод
    if (empty($type_dev)or empty($mark_dev) or empty($serial_num)or empty($mounth) or empty($exet)) {
        print("Данные введены неполностью");
        print ("<input type='submit' value='Вернуться к редактированию даннх'onClick='history.go(-1)'");
    }
    else {
    // подключаемся к БД
    include "no_push.php";
    $connect=mysqli_connect($host,$user,$password,$db);
    if (!$connect) die("Ошибка подключения");
    
    print("Подключение прошло успешно");
    $select=!mysqli_select_db($connect,"table_work");
    if(!$select)
    die("Ошибка выбора базы данных");
    print("База данных успешно выбрана");
    $qresult=mysqli_query($connect,"INSERT  INTO table_work(type_dev,mark_dev,serial_num,mouth,exet)
    values
    ('".$type_dev."','".$mark_dev."','".$serial_num."','".$mounth."','".$exet."')
    ");
    if (!$qresult) {
print("упс,что-то пошло не так");
    }
    else
    print("Запись прошла успешно");
    }
    print ("<input type='submit' value='Вернуться к редактированию даннх'onClick='history.go(-1)'");
    
    ?>


</body>
</html>