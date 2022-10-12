<?php
    $n = 15;
    $k = 3;


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $n = (int) $_POST['n'];
        $k = (int) $_POST['k'];
    }

    $n = ($n) ? $n : 15;
    $k = ($k) ? $k : 3;

    $numbers = [];
    for ($i = 0; $i < $n; $i++){
        $numbers[$i] = $i + 1;
        $numbers[$i] = (string)$numbers[$i];
    }

    # Воспользуемся алгоритмом пузырьковой сортировки

    for ($i = 0; $i < $n; $i++){
        $flag = 0;
        for ($j = 0; $j < $n - 1 - $i; $j++){
            # Сравниваем элементы(строки) с помощью функции strcasecmp
            if (strcasecmp($numbers[$j], $numbers[$j + 1]) > 0){  
                list($numbers[$j], $numbers[$j+1]) = [$numbers[$j+1],$numbers[$j]];
                $flag = 1;
            }
        }
            
        if ( 0 == $flag ){
            break;
        }
    }

    # k -- это элемент, место которого надо найти в отсортированном массиве

    echo "<pre>";
        print_r($numbers);
    echo "</pre>";
    if ($k > $n){
        echo "В данном массиве нет такого числа k";
    }else{
        echo "На " . array_search($k, $numbers) + 1 . " месте"; # увеличиваем на 1, т.к. нумерация массива начинается с нуля
        echo "<hr>";
    }
    
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ЗАДАНИЕ 3</title>
</head>
<body>
    <form action = '<?=$_SERVER['REQUEST_URI']?>' method = 'POST'>
    <label>Число n: </label>
      <br>
      <input name='n' type='text' value='<?=$n?>'>
      <br>
      <label>Число k: </label>
      <br>
      <input name='k' type='text' value='<?=$k?>'>
      <br>
      <br>
      <button type='submit'>Подтвердить</button>
    </form>
</body>
</html>