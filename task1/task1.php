<?php 

    mb_internal_encoding("UTF-8");

    $articleLink = "https://ru.wikipedia.org/wiki/%D0%93%D0%B8%D0%BF%D0%BE%D1%82%D0%B5%D0%B7%D0%B0_%D0%9F%D1%83%D0%B0%D0%BD%D0%BA%D0%B0%D1%80%D0%B5#:~:text=%D0%93%D0%B8%D0%BF%D0%BE%D1%82%D0%B5%D0%B7%D0%B0%20%D0%9F%D1%83%D0%B0%D0%BD%D0%BA%D0%B0%D1%80%D0%B5%CC%81%20%E2%80%94%20%D0%B4%D0%BE%D0%BA%D0%B0%D0%B7%D0%B0%D0%BD%D0%BD%D0%B0%D1%8F%20%D0%BC%D0%B0%D1%82%D0%B5%D0%BC%D0%B0%D1%82%D0%B8%D1%87%D0%B5%D1%81%D0%BA%D0%B0%D1%8F%20%D0%B3%D0%B8%D0%BF%D0%BE%D1%82%D0%B5%D0%B7%D0%B0,2002%E2%80%942003%20%D0%B3%D0%BE%D0%B4%D0%BE%D0%B2%20%D0%93%D1%80%D0%B8%D0%B3%D0%BE%D1%80%D0%B8%D0%B5%D0%BC%20%D0%9F%D0%B5%D1%80%D0%B5%D0%BB%D1%8C%D0%BC%D0%B0%D0%BD%D0%BE%D0%BC.";
    
    $articleText = "Доказанная математическая гипотеза о том, что всякое <i>односвязное компактное трёхмерное многообразие без края</i> 
    
    гомеоморфно трёхмерной сфере. Сформулированная в <b>1904</b> году математиком Анри Пуанкаре гипотеза была доказана в серии статей 2002—2003 
    
    годов Григорием Перельманом. После подтверждения доказательства математическим сообществом в <b>2006</b> году гипотеза Пуанкаре стала первой 
    
    и единственной на данный момент (2022 год) решённой задачей тысячелетия.";

    #удаляем теги <br>

    $articleText = str_ireplace(array('<br>', '<br />', '<br/>'), ' ', $articleText);

    # удаляем все HTML символы из текста(Если они есть):

    $articleText = strip_tags($articleText);

    #удаляем лишние пробелы

    $articleText = trim($articleText);
    $articleText = preg_replace('/\s+/', ' ', $articleText);

    # Теперь обрезаем его до 200 символов

    $articleText = mb_substr($articleText, 0, 200);

    #Теперь добавляем троеточие
    $articleText .= "...";

    # Теперь нам надо получить последние три слова в переменной $articleText

    $array = explode(' ', $articleText);
    $last3words = implode(' ', array_slice($array, count($array) - 3, 3));
    $otherPartOfText = implode(' ', array_slice($array, 0, count($array) - 3));

    # добавляем ссылку на последние 3 слова и многоточие

    $articlePreview = $otherPartOfText . " <a href='$articleLink'>$last3words</a>";
    echo "<br />" . $articlePreview;
    
    /*
    Таким образом, проблемы следующие:
        1)При подсчете символов строки, учитываются также HTML символы(эти символы необходимо удалить)
        2)Если мы хотим, чтобы текст в переменной $articlePreview имел такие же стили как и текст из $articleText, 
        необходимо с этим поработать
        3)Для обработки многобайтовых строк используется расширение mb
    */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ЗАДАНИЕ 1</title>
    <style>
        a:visited{
            color: red;
        }
        a:hover{
            color: green;
            
        }
    </style>
</head>
<body>
    
</body>
</html>