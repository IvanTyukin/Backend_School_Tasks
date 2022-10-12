<?php
    $n = 3;
    $m = 3;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $n = (int) $_POST['n'];
        $m = (int) $_POST['m'];
    }


    /*
      По сути, у нас есть три операции (Операция удаления 1 фатальной ошибки бессмысленна, 
      так как в этом случае снова появляется 1 фатальная ошибка). Итак, 
      I-операция: Исправляем Ворнинг -- получаем 2 Ворнинга
      II-операция: Исправляем 2 Ворнинга -- получаем одну Фатальную ошибку
      III-операция: Исправляем 2 Фатальных ошибки -- ничего не появляется
    */

    /**
     * warningTrunc функция находит минимальное количество коммитов, необходимое Пете, чтобы устранить все ворнинги и фатальные ошибки
     * 
     * @param  integer $fatals Количество фатальных ошибок в коде Пети
     * @param  integer $warnings Количество ворнингов в коде Пети
     * @return -1 - исправить код невозможно, $k + $warnings/2 + ($fatals + $warnings/2)/2 - минимальное количество коммитов для исправления ошибок
     */    
    
    function warningTrunc($fatals, $warnings){
        $k = 0;
        if ($fatals % 2  != 0 and $warnings  == 0){ 
            return -1;                                         
        }

        while ($warnings % 2 != 0 or ($fatals + ($warnings / 2)) % 2 != 0 and $warnings % 2 == 0){
            $warnings++;            
            $k++;                                           
        }                          
        
        return $k + $warnings/2 + ($fatals + $warnings/2)/2;
    }
    echo "Минимальное количество коммитов: " . warningTrunc($n,$m);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ЗАДАНИЕ 2</title>
</head>
<body>
<form action = '<?=$_SERVER['REQUEST_URI']?>' method = 'POST'>
    <label>Число фатальных ошибок n: </label>
      <br>
      <input name='n' type='text' value='<?=$n?>'>
      <br>
      <label>Число ворнингов m: </label>
      <br>
      <input name='m' type='text' value='<?=$m?>'>
      <br>
      <br>
      <button type='submit'>Подтвердить</button>
    </form>
</body>
</html>