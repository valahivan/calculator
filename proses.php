<?php 
session_start();

function addition($value1, $value2){
    return $value1 + $value2;
}
function substraction($value1, $value2){
    return $value1 - $value2;
}
function multiply($value1, $value2){
    return $value1 * $value2;
}
function division($value1, $value2){
    return $value1 / $value2;
}

$_SESSION['result'] = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];

    if(empty($num1) || empty($num2)){
        $_SESSION['pesan'] = 'Inputan tidak boleh kosong!';
        header('Location: index.php');
        return false;
    }elseif(!is_numeric($num1) && !is_numeric($num2)){
        $_SESSION['pesan'] = 'Anda harus mengisikan angka!';
        header('Location: index.php');
        return false;
    }

    $operator = $_POST['operator'];
    switch ($operator) {
        case 'addition':
            $_SESSION['pesan'] =  addition($num1, $num2);
            header('Location: index.php?num1=' . $num1 . '&num2=' . $num2 . '&operator=' . $operator);
            break;
        case 'substraction':
            $_SESSION['pesan'] =  substraction($num1, $num2);
            header('Location: index.php?num1=' . $num1 . '&num2=' . $num2 . '&operator=' . $operator);
            break;
        case 'multiply':
            $_SESSION['pesan'] =  multiply($num1, $num2);
            header('Location: index.php?num1=' . $num1 . '&num2=' . $num2 . '&operator=' . $operator);
            break;
        case 'division':
            $_SESSION['pesan'] = (!$num2 == 0) ? division($num1, $num2) : 'Pembagian tidak boleh mengguanakan angka 0';
            header('Location: index.php?num1=' . $num1 . '&num2=' . $num2 . '&operator=' . $operator);
            break;
        default:
            $_SESSION['pesan'] = 'Pilih operator yang anda ingin gunakan terlebih dahulu!';
            header('Location: index.php?num1=' . $num1 . '&num2=' . $num2 . '&operator=' . $operator);
            break;
    }
}
?>