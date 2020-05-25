<!DOCTYPE html>
<html>
<body>

<form action="index.php" method="post">
    <div>
        <label for="numberOfCodes">Ilość kodów</label>
        <input type="text" name="numberOfCodes" value="10"/>
    </div>
    <div>
        <label for="numberOfCodes">Długość kodu</label>
        <input type="text" name="lengthOfCode" value="10"/>
    </div>
    <div>
        <label for="numberOfCodes">Nazwa pliku do którego zostaną zapisane kody</label>
        <input type="text" name="outputFile" value="kody.txt"/>
    </div>
    <div>
        <button type="submit">Zapisz</button>
    </div>
</form>
</body>
</html>

<?php

if(strtolower($_SERVER["REQUEST_METHOD"]) === 'post')
{
    include '../vendor/autoload.php';
    try
    {
        $app = new \App\App();
        $parameters = [
            null,
            $_POST['numberOfCodes'] ?? null,
            $_POST['lengthOfCode'] ?? null,
            $_POST['outputFile'] ? (__DIR__ . '/output/' . $_POST['outputFile']) : null
        ];
        $app->validate($parameters);
        $file = $app($parameters[1], $parameters[2], $parameters[3]);
        ob_clean();
        header('Content-Description: File Transfer');
        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename="' . basename($_POST['outputFile']) . '"');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    }
    catch(\Exception $exception)
    {
        echo '<div>' . $exception->getMessage() . PHP_EOL . '<div>';
    }
}
