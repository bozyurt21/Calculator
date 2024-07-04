<!DOCTYPE html>
<html lang="en">

<>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>✖️Calculator✖️</title>
    </head>

    <body>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> <!--return to the same page!!-->
            <h1 style="color:aliceblue">➕ Calculator ✖️</h1>
            <input type="number" name="num1" placeholder="First Number">
            <select name="operator">
                <option value="add">+</option>
                <option value="substract">-</option>
                <option value="multiply">*</option>
                <option value="divide">/</option>
            </select>
            <input type="number" name="num2" placeholder="Second Number">
            <button type="submit">Calculate</button>

        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $num1 = filter_input(INPUT_POST, "num1", FILTER_SANITIZE_NUMBER_FLOAT);
            $num2 = filter_input(INPUT_POST, "num2", FILTER_SANITIZE_NUMBER_FLOAT);
            $operator = htmlspecialchars($_POST["operator"]);
            $value = 0;

            // Error handlers
            $error = false;
            if (empty($num1) || empty($num2) || empty($operator)) {
                echo "<p class='calc-error'>You need to fill in blanc!</p>";
                $error = true;
            }

            if (!is_numeric($num1) || !is_numeric($num2)) {
                echo "<p class='calc-error'>You need to fill with numbers!</p>";
                $error = true;
            }

            // Calculate the numbers when there is no error
            if (!$error) {
                switch ($operator) {
                    case "add":
                        $value = $num1 + $num2;
                        break;
                    case "substract":
                        $value = $num1 - $num2;
                        break;
                    case "multiply":
                        $value = $num1 * $num2;
                        break;
                    case "substract":
                        $value = $num1 / $num2;
                        break;
                    default:
                        echo "<p class='calc-error'>Something went wrong!</p>";
                }
                echo "<p class='calc'>" . $value . "</p>";
            }
        }
        ?>

    </body>

</html>