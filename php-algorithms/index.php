<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- <main>
        <section class="section basic-algo">
            <div class="php-container">
                <code></code>
                <div class="result"></div>
            </div>
            <div class="js-container"></div>
        </section>
    
    </main> -->
    <h2>Algo1: Basic Algorithms</h2>
    <h3>Convert Celsius to Fahrenheit</h3>
    <?php
    function convertToF($celsius)
    {
        return $celsius * 9 / 5 + 32;
    };

    echo convertToF(30);
    ?>
    <div class="js-result-algo1"></div>
    <script>
        function convertToF(celsius) {
            return celsius * 9 / 5 + 32;
        };

        document.querySelector(".js-result-algo1").innerHTML = convertToF(30);
    </script>
    <hr>

    <h3>Algo2: Reverse a String</h3>
    <?php
    function reverseString($str)
    {
        return strrev($str);
    }

    echo reverseString("hello");
    ?>
    <div class="js-result-algo2"></div>
    <script>
        function reverseString(str) {
            return str.split("").reverse().join("");
        }

        document.querySelector(".js-result-algo2").innerHTML = reverseString("hello");
    </script>
    <hr>

    <h3>Algo3: Factorialize a Number</h3>
    <?php
    function factorialize($num)
    {
        $result_a3 = 1;
        for ($i_a3 = 1; $i_a3 <= $num; $i_a3++) {
            $result_a3 *= $i_a3;
        }
        return $result_a3;
    }

    echo factorialize(5);
    ?>
    <div class="js-result-algo3"></div>
    <script>
        function factorialize(num) {
            let result = 1;
            for (let i = 1; i <= num; i++) {
                result *= i;
            }
            return result;
        }

        document.querySelector(".js-result-algo3").innerHTML = factorialize(5);
    </script>
    <hr>

    <h3>Algo4: Find the Longest Word in a String</h3>
    <?php
    function findLongestWordLength($str)
    {
        $longest = 0;
        $arr = explode(" ", $str);
        foreach ($arr as $item) {
            if (strlen($item) > $longest) {
                $longest = strlen($item);
            }
        }
        return $longest;
    }

    echo findLongestWordLength("The quick brown fox jumped over the lazy dog");
    ?>
    <div class="js-result-algo4"></div>
    <script>
        function findLongestWordLength(str) {
            let longest = 0;
            str
                .split(" ")
                .forEach(el => el.length > longest ? longest = el.length : null);
            return longest;
        }

        document.querySelector(".js-result-algo4").innerHTML = findLongestWordLength("The quick brown fox jumped over the lazy dog");
    </script>
    <hr>

    <h3>Algo5: Return Largest Numbers in Arrays</h3>
    <?php
    function largestOfFour($arr)
    {
        $result = [];
        foreach ($arr as $list) {
            $largest = $list[0];
            foreach ($list as $num) {
                $num > $largest ? $largest = $num : null;
            }
            $result[] = $largest;
        }
        return $result;
    }

    $result_a5 = largestOfFour([[4, 5, 1, 3], [13, 27, 18, 26], [32, 35, 37, 39], [1000, 1001, 857, 1]]);
    // $print_a5 = "[ ";
    // foreach ($result_a5 as $key_a5 => $num_a5) {
    //     $key_a5 < count($result_a5) - 1 ? $print_a5 .= $num_a5 . ", " : $print_a5 .= $num_a5 . " ]";
    // }
    $result_a5 = implode(", ", $result_a5);
    $print_a5 = "[ $result_a5 ]";
    echo $print_a5;
    ?>
    <div class="js-result-algo5"></div>
    <script>
        function largestOfFour(arr) {
            let result = [];
            let largest;
            arr.forEach(list => {
                largest = list[0];
                list.forEach(num => num > largest ? largest = num : null);
                result.push(largest);
            })
            return result;
        }

        let result_a5 = largestOfFour([
            [4, 5, 1, 3],
            [13, 27, 18, 26],
            [32, 35, 37, 39],
            [1000, 1001, 857, 1]
        ]);

        let print_a5 = `[ ${result_a5.join(", ")} ]`;

        document.querySelector(".js-result-algo5").innerHTML = print_a5;
    </script>
    <hr>

    <h3>Algo6: Confirm the Ending</h3>
    <?php
    function confirmEnding($str, $target)
    {
        return substr($str, -strlen($target)) === $target;
    }

    var_dump(confirmEnding("Bastian", "n"));
    ?>
    <div class="js-result-algo6"></div>
    <script>
        function confirmEnding(str, target) {
            return str.slice(-target.length) === target;
        }

        document.querySelector(".js-result-algo6").innerHTML = confirmEnding("Bastian", "n");
    </script>
    <hr>

    <h3>Algo7: Repeat a String</h3>
    <?php
    function repeatStringNumTimes($str, $num)
    {
        $result_a7 = "";

        for ($i = 1; $i <= $num; $i++) {
            $result_a7 .= $str;
        }

        return $result_a7;
    }

    echo repeatStringNumTimes("abc", 3);
    ?>
    <div class="js-result-algo7"></div>
    <script>
        function repeatStringNumTimes(str, num) {
            let result = "";

            for (let i = 1; i <= num; i++) {
                result += str;
            }

            return result;
        }

        document.querySelector(".js-result-algo7").innerHTML = repeatStringNumTimes("abc", 3);
    </script>
    <hr>

    <h3>Algo8: Truncate a String</h3>
    <?php
    function truncateString($str, $num)
    {
        return strlen($str) > $num ? substr($str, 0, $num) . "..." : $str;
    }

    echo truncateString("A-tisket a-tasket A green and yellow basket", 8);
    ?>
    <div class="js-result-algo8"></div>
    <script>
        function truncateString(str, num) {
            return str.length > num ? str.slice(0, num) + "..." : str;
        }

        document.querySelector(".js-result-algo8").innerHTML = truncateString("A-tisket a-tasket A green and yellow basket", 8);
    </script>
    <hr>

    <h3>Algo9: Finders Keepers</h3>
    <?php
    function findElement($arr, $func)
    {
        foreach ($arr as $el) {
            if ($func($el)) {
                return $el;
            }
        }
    }

    echo findElement([1, 2, 3, 4], function ($num) {
        return $num % 2 === 0;
    });
    ?>
    <div class="js-result-algo9"></div>
    <script>
        function findElement(arr, func) {
            for (let el of arr) {
                if (func(el)) {
                    return el;
                }
            }
        }

        document.querySelector(".js-result-algo9").innerHTML = findElement([1, 2, 3, 4], num => num % 2 === 0);
    </script>
    <hr>

    <h3>Algo10: Boo who</h3>
    <?php
    function booWho($bool)
    {
        return gettype($bool) === "boolean";
    }

    var_dump(booWho(null));
    ?>
    <div class="js-result-algo10"></div>
    <script>
        function booWho(bool) {
            return typeof bool === "boolean";
        }

        document.querySelector(".js-result-algo10").innerHTML = booWho(null);

    </script>
    <hr>


</body>

</html>