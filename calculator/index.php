<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <input type="number" name="numb1" placeholder="Number 1" required>
        <select name="operator">
            <option value="add">+</option>
            <option value="substract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
        </select><br>
        <input type="number" name="numb2" placeholder='Number 2' required>
        <button>Rezultat</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $numb1 = filter_input(INPUT_POST, 'numb1', FILTER_SANITIZE_NUMBER_FLOAT);
        $numb2 = filter_input(INPUT_POST, 'numb2', FILTER_SANITIZE_NUMBER_FLOAT);
        $operator = htmlspecialchars($_POST['operator']);

        if ($operator) {
            $value = 0;
            switch ($operator) {
                case 'add':
                    $value = $numb1 + $numb2;
                    break;
                case 'substract':
                    $value = $numb1 - $numb2;
                    break;
                case 'multiply':
                    $value = $numb1 * $numb2;
                    break;
                case 'divide':
                    $value = $numb1 / $numb2;
                    break;
            }
            echo "<p class='calc-result'>Result = " . $value. "</p>";
        }
    }
    ?>
</body>

</html>