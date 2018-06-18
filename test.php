<?php
require_once __DIR__ . '/functions.php';

$test_dir = "./DownloadFiles/test";
$test_id = $test_dir.$_GET["id"].".json";
if (file_exists($test_id)) {
    $json_file = file_get_contents($test_id);
    $json_array = json_decode($json_file, true);
} else {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<a href="list.php">Список загруженных тестов</a>
<form action="" method="POST" enctype="multipart/form-data">
    <?php foreach ($json_array as $elem) { ?>
        <?php for ($i = 0; $i < count($elem); $i++){ ?>
        <fieldset>
            <h1><?php echo $json_array[$i]['question']?></h1>
            <?php foreach ($json_array[$i]['answers'] as $values) { ?>
                <?php for ($j = 0; $j < count($json_array[$i]['answers']); $j++){ ?>
                <label>
                    <input type="radio" name="answer<?=$i;?>" value="<?=$values;?>"> <?php echo $values; break;?>
                    <input type="hidden" name="correct_answer<?=$i;?>">
                </label>
                <?php } ?>
            <?php } ?>
        </fieldset> 
        <?php }  break;?>
    <?php } ?>
<button type="submit" name="submit">Результат</button>
</form>
</body>
</html>

<?php
$ot = 0;
$not = 0;
foreach ($json_array as $elem) {
    for ($i = 0; $i < count($elem); $i++) {
        $corans = $json_array[$i]['correct_answer'];
        $ans = isset($_POST["answer" . $i])?$_POST["answer" . $i]:'';
        if ($ans == $corans){
            $ot++;
        } else {
            $not++;
        } 
    } break;
}
if (isset($_POST["submit"])) {?> 
  <p>Правильных ответов: <?php echo $ot; ?></p>
  <p>Неправильных ответов:<?php echo $not; ?></p>
<?php
    $name = $_SESSION['user'];
    $result = round($ot / $i * 100);
?> 
<a href="certificate.php?name=$name&result=$result">Получить сертификат</a>

<?php } ?> 
