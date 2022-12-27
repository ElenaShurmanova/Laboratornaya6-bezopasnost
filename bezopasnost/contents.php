<?php
    $link = mysqli_connect('localhost', 'root', 'root', 'lw_2_bez');
    
    // проверка подключения
    if($link === false){
        die("ERROR: Нет подключения. " . mysqli_connect_error());
    }

    $sql = 'SELECT * FROM contents'; // запрос для вывода контента
    $result = mysqli_query($link,$sql);

    while ($row = mysqli_fetch_array($result)) {
        print("Идентификатор:" . $row['id'] . "<br>" . "Заголовок: " . $row['title'] . "<br>" . "Текст статьи: " . $row['content'] . "<br>" . "<br>");
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <!-- Страница с контентом -->

    <form>
        <div class="navigation">
            <a class="active" href="profile.php">Профиль</a><br>
        </div>
        
    </form>
    <!-- комментарий -->
    <form method="post">
        <input type="text" name="text" placeholder="Оставьте свой комментарий"></input>
        <input id="comm" type="submit" name="comment" value="Отправить"></input>
    </form>

    <?php
        if(isset($_POST['comment'])){
            //  экранирует специальные символы в строке
            $str = mysqli_real_escape_string($link, $_REQUEST['text']);
    
            // Попытка выполнения запроса вставки
            $sql = "INSERT INTO comm (comments) VALUES ('$str')";
            $res = mysqli_query($link, $sql);
            if($res){
                echo "Записи успешно добавлены.";
            } else{
                echo "ERROR: Не удалось выполнить $sql. " . mysqli_error($link);
            }
            
            // Закрыть соединение
            mysqli_close($link);
    
            // https://wm-school.ru/php/php_mysql_insert.php спасибо автору, реализация взята и адаптирована отсюда))
        }
    ?>
</body>
</html>