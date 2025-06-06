
<form method="post">
    <label> Number 1: </label>
    <input type="number" name="num1" requiered>

    <label> Number 2: </label>
    <input type="number" name="num2" requiered>

    <button type="submit">Swap</button>
</form>

<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $num1=$_POST["num1"];
        $num2=$_POST["num2"];

        echo "<p>Befor swap: </p>";
        echo "Number 1: $num1<br>";
        echo "Number 2: $num2<br>";

        $temp=$num1;
        $num1=$num2;
        $num2=$temp;

        echo "<p>After swap: </p>";
        echo "Number 1: $num1<br>";
        echo "Number 2: $num2<br>";
    }
?>
