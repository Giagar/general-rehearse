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
    <h2>Basic Algorithms</h2>
    <h3>Algo1: Convert Celsius to Fahrenheit</h3>
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

    <h3>Algo11: Title Case a Sentence</h3>
    <?php
    function titleCase($str)
    {
        $arr = explode(" ", $str);
        foreach ($arr as $el) {
            $result[] = strtoupper($el[0]) . strtolower(substr($el, 1));
        }
        return implode(" ", $result);
    }

    echo titleCase("I'm a little tea pot");
    ?>
    <div class="js-result-algo11"></div>
    <script>
        function titleCase(str) {
            let result = [];
            str
                .split(" ")
                .forEach(el => result.push(el[0].toUpperCase() + el.slice(1).toLowerCase()));

            return result.join(" ");
        }

        document.querySelector(".js-result-algo11").innerHTML = titleCase("I'm a little tea pot");
    </script>
    <hr>

    <h3>Algo12: Slice and Splice</h3>
    <?php
    function frankenSplice($arr1, $arr2, $n)
    {

        foreach (array_slice($arr2, 0, $n) as $el2) {
            $result[] = $el2;
        }

        foreach ($arr1 as $el1) {
            $result[] = $el1;
        }

        foreach (array_slice($arr2, $n) as $el2s) {
            $result[] = $el2s;
        }

        return $result;
    }
    var_dump(frankenSplice([1, 2, 3], [4, 5, 6], 1));

    ?>
    <div class="js-result-algo12"></div>
    <script>
        function frankenSplice(arr1, arr2, n) {
            let result = [];

            result = [...arr2.slice(0, n), ...arr1, ...arr2.slice(n)];

            return result;
        }

        document.querySelector(".js-result-algo12").innerHTML = `[ ${frankenSplice([1, 2, 3], [4, 5, 6], 1)} ]`;
    </script>
    <hr>

    <h3>Algo13: Falsy Bouncer</h3>
    <?php

    function bouncer($arr)
    {
        foreach ($arr as $el) {
            if ($el) {
                $result[] = $el;
            }
        }

        return $result;
    }

    var_dump(bouncer([7, "ate", "", false, 9]));
    ?>
    <div class="js-result-algo13"></div>
    <script>
        function bouncer(arr) {
            return arr.filter(el => el);
        }

        document.querySelector(".js-result-algo13").innerHTML = bouncer([7, "ate", "", false, 9]);
    </script>
    <hr>

    <h3>Algo14: Where do I Belong</h3>
    <?php
    function getIndexToIns($arr, $num)
    {
        $result = [...$arr];
        $result[] = $num;
        sort($result, $flags = SORT_NUMERIC);
        return array_search($num, $result);
    }

    echo getIndexToIns([40, 60], 50);
    ?>
    <div class="js-result-algo14"></div>
    <script>
        function getIndexToIns(arr, num) {
            let result = [...arr, num];

            return result
                .sort((a, b) => a - b)
                .indexOf(num);
        }

        document.querySelector(".js-result-algo14").innerHTML = getIndexToIns([40, 60], 50);
    </script>
    <hr>

    <h3>Algo15: Mutations</h3>
    <?php
    function mutation($arr)
    {
        foreach (str_split($arr[1]) as $letter) {
            if (!preg_match("/$letter/i", $arr[0])) {
                return false;
            }
        }
        return true;
    }

    var_dump(mutation(["hello", "hey"]));

    ?>
    <div class="js-result-algo15"></div>
    <script>
        function mutation(arr) {
            for(let letter of arr[1]) {
                let regex = new RegExp(letter, "i");
                if(!regex.test(arr[0])) {
                    return false;
                }
            }

            return true;
        }

        document.querySelector(".js-result-algo15").innerHTML = mutation(["hello", "hey"]);


    </script>
    <hr>

    <h3>Algo16: Chunky Monkey</h3>
    <?php
    // function mutation($arr)
    // {
    //     foreach (str_split($arr[1]) as $letter) {
    //         if (!preg_match("/$letter/i", $arr[0])) {
    //             return false;
    //         }
    //     }
    //     return true;
    // }

    // var_dump(mutation(["hello", "hey"]));

    ?>
    <div class="js-result-algo16"></div>
    <script>
        // function mutation(arr) {
        //     for(let letter of arr[1]) {
        //         let regex = new RegExp(letter, "i");
        //         if(!regex.test(arr[0])) {
        //             return false;
        //         }
        //     }

        //     return true;
        // }

        // document.querySelector(".js-result-algo16").innerHTML = mutation(["hello", "hey"]);


    </script>
    <hr>

    <h2>Intermediate Algorithms</h2>
    <h3>Algo17: Sum all numbers in a range</h3>
    <?php
    // function mutation($arr)
    // {
    //     foreach (str_split($arr[1]) as $letter) {
    //         if (!preg_match("/$letter/i", $arr[0])) {
    //             return false;
    //         }
    //     }
    //     return true;
    // }

    // var_dump(mutation(["hello", "hey"]));

    ?>
    <div class="js-result-algo17"></div>
    <script>
    function sumAll(arr) {
        let result = 0;
        arr = arr.sort((a, b) => a-b);

        for(let i = arr[0]; i <= arr[arr.length - 1]; i++) {
            result += i;
        }

        return result; 
    }
    
    document.querySelector(".js-result-algo17").innerHTML = sumAll([1, 4]);

    </script>
    <hr>

    <h3>Algo18: Diff Two Arrays</h3>
    <?php
    // function mutation($arr)
    // {
    //     foreach (str_split($arr[1]) as $letter) {
    //         if (!preg_match("/$letter/i", $arr[0])) {
    //             return false;
    //         }
    //     }
    //     return true;
    // }

    // var_dump(mutation(["hello", "hey"]));

    ?>
    <div class="js-result-algo18"></div>
    <script>
    function diffArray(arr1, arr2) {
        let all = [...arr1, ...arr2];
        let result = [];

        for(let i = 0; i < all.length; i++) {
            let newArray = [...all.slice(0, i), ...all.slice(i + 1, all.length)];
            if((newArray).indexOf(all[i]) === -1) {
                result.push(all[i]);
            }
        }

        return result;

    }

    document.querySelector(".js-result-algo18").innerHTML = diffArray([1, 2, 3, 5], [1, 2, 3, 4, 5]);

    </script>
    <hr>

    <h3>Algo19: Seek and Destroy</h3>
    <?php
    // function mutation($arr)
    // {
    //     foreach (str_split($arr[1]) as $letter) {
    //         if (!preg_match("/$letter/i", $arr[0])) {
    //             return false;
    //         }
    //     }
    //     return true;
    // }

    // var_dump(mutation(["hello", "hey"]));

    ?>
    <div class="js-result-algo19"></div>
    <script>
    function destroyer(arr) {
        let args = [...arguments];

        for(let i = 1; i < args.length; i++) {
            for(let l = 0; l < arr.length; l++) {
                if(args[i] === arr[l]) {
                    arr[l] = null;
                }
            }
        }

        return arr.filter(el => el);

    }

    document.querySelector(".js-result-algo19").innerHTML = destroyer([1, 2, 3, 1, 2, 3], 2, 3);

    </script>
    <hr>

    <h3>Algo20: Wherefore art thou</h3>
    <?php
    // function mutation($arr)
    // {
    //     foreach (str_split($arr[1]) as $letter) {
    //         if (!preg_match("/$letter/i", $arr[0])) {
    //             return false;
    //         }
    //     }
    //     return true;
    // }

    // var_dump(mutation(["hello", "hey"]));

    ?>
    <div class="js-result-algo20"></div>
    <script>
    function whatIsInAName(collection, source) {
    var arr = [];
    // Only change code below this line
    

    // Only change code above this line
    return arr;
    }

    document.querySelector(".js-result-algo20").innerHTML = whatIsInAName([{ first: "Romeo", last: "Montague" }, { first: "Mercutio", last: null }, { first: "Tybalt", last: "Capulet" }], { last: "Capulet" });

    </script>
    <hr>


</body>

</html>