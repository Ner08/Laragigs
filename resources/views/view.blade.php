<html>

<body>

    <?php
    // define variables and set to empty values
    $name = $email = $gender = $comment = $website = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = test_input($_POST['name']);
        $email = test_input($_POST['email']);
        $website = test_input($_POST['website']);
        $comment = test_input($_POST['comment']);
        $gender = test_input($_POST['gender']);
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>PHP Form Validation Example</h2>
    <form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        Name: <input type="text" name="name">
        <br><br>
        E-mail: <input type="text" name="email">
        <br><br>
        Website: <input type="text" name="website">
        <br><br>
        Comment:
        <textarea name="comment" rows="5" cols="40"></textarea>
        <br><br>
        Gender:
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="other">Other
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    $cars = ['volvo', 'bmw', 'toyota'];
    sort($cars);

    foreach ($cars as $car) {
        echo $car . '<br>';
    }

    $numbers = [1, 2, 5, 4, 23, 88, 33];
    rsort($numbers);

    echo '<br><b>sorted array</b><br>';
    foreach ($numbers as $num) {
        echo $num . '<br>';
    }
    $age = ['Ben' => 18, 'Jill' => 40, 'Mike' => 22];
    $ageRev = ['Ben' => 18, 'Jill' => 40, 'Mike' => 22];
    asort($age);
    krsort($ageRev);
    echo '<br>';

    foreach ($age as $name => $num) {
        echo 'Name: ' . $name . ',    Age: ' . $num . '<br>';
    }

    echo '<br>';

    foreach ($ageRev as $name => $num) {
        echo 'Name: ' . $name . ',    Age: ' . $num . '<br>';
    }

    echo '<br>';

    $x = 75;
    echo $_SERVER['PHP_SELF'];
    echo '<br>';
    echo $_SERVER['SERVER_NAME'];
    echo '<br>';
    echo $_SERVER['HTTP_HOST'];
    echo '<br>';
    echo $_SERVER['HTTP_USER_AGENT'];
    echo '<br>';
    echo $_SERVER['SCRIPT_NAME'];

    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //     $name = $REQUEST['fname'];
    //     if (empty($name)) {
    //         echo 'Name is empty!';
    //     } else {
    //         echo $name;
    //     }
    // }

    echo '<br>';
    echo '<br> Number of instances of the expression in the string: ';
    $exp = '/ain/i';
    $str = 'The rain in SPAIN falls mainly on the plains.';
    echo preg_match_all($exp, $str);

    echo '<br>';
    echo '<br> Replace instances of the sting with... ';
    $str = 'Visit Microsoft!';
    $pattern = '/microsoft/i';
    echo preg_replace($pattern, 'W3Schools', $str);

    echo '<br>';
    echo '<br> Is there a digit in the variable:  ';
    $str = 'Apples and bananas.';
    $pattern = '/ba(na){2}/i';
    echo preg_match($pattern, $str);
    ?>
</body>

</html>
