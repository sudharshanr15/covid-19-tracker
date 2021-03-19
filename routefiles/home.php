<?php
// include_once "./../routefiles/home.php";
$fp = fopen(__DIR__ . "\\..\\records\\dailyrecords.csv", "r");
if(!$fp){
    die();
}

$arr = array();

for($num=0, $i=0; fseek($fp, $i, SEEK_END) !== -1; $i--){
    $char = fgetc($fp);
    if($char === "\n"){
        $num++;
        continue;
    }

    $arr[$num] = $char. ((array_key_exists($num, $arr)) ? $arr[$num] : "");
}
fclose($fp);
array_pop($arr);

$today = $arr[0];
$yesterday = $arr[1];
$todayArr = explode(',', $today);
$yesterdayArr = explode(',', $yesterday);
?>
<div class="container">
    <h2><a href="/India/dailyrecords" class="text-dark">Corona cases in India:</a></h2>
    <div class="d-flex justify-content-between">
        <table class="table table-hover shadow-lg" style="width: 40%">
            <thead>
                <tr>
                    <th colspan="2" class="text-center table-dark">Today</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>New cases: </th>
                    <td class="text-danger">+<?=$todayArr[2];?></td>
                </tr>
                <tr>
                    <th>Recovered: </th>
                    <td class="text-success">+<?=$todayArr[4];?></td>
                </tr>
                <tr>
                    <th >Death: </th>
                    <td class="text-danger">+<?=$todayArr[6];?></td>
                </tr>
                <tr>
                    <th>Total cases: </th>
                    <td><?=$todayArr[3];?></td>
                </tr>
                <tr>
                    <th>Total Recovered: </th>
                    <td><?=$todayArr[5];?></td>
                </tr>
                <tr>
                    <th>Total Deceased: </th>
                    <td><?=$todayArr[7];?></td>
                </tr>
            </tbody>
        </table>

        <table class="table table-hover shadow-lg" style="width: 40%">
            <thead>
                <tr>
                    <th colspan="2" class="text-center table-dark">Yesterday</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>New cases: </th>
                    <td class="text-danger">+<?=$yesterdayArr[2];?></td>
                </tr>
                <tr>
                    <th>Recovered: </th>
                    <td class="text-success">+<?=$yesterdayArr[4];?></td>
                </tr>
                <tr>
                    <th>Death: </th>
                    <td class="text-danger">+<?=$yesterdayArr[6];?></td>
                </tr>
                <tr>
                    <th>Total cases: </th>
                    <td><?=$yesterdayArr[3];?></td>
                </tr>
                <tr>
                    <th>Total Recovered: </th>
                    <td><?=$yesterdayArr[5];?></td>
                </tr>
                <tr>
                    <th>Total Deceased: </th>
                    <td><?=$yesterdayArr[7];?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <h3 class="my-2"><a href="/India/state/karnataka" class="text-dark">Karnataka:</a></h3>
    <div class="d-flex justify-content-between">
        <table class="table table-hover shadow-lg" style="width: 40%">
            <thead>
                <tr>
                    <th colspan="2" class="text-center table-dark">Today</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $fp = fopen(__DIR__."\\..\\records\\states.csv", "r");
                if(!$fp){
                    die();
                }
                $arr = [];
                for($i=0; !feof($fp); $i++){
                $arr[$i] = fgets($fp);
                }
                $count = count($arr) - 1;
                $x=1;
                for($i=($count), $j=0; $j<3; $j++, $i--){
                    $line = $arr[$i];
                    $line = explode(",", $line);
                    // echo $arr[$i];
                    if(3-$x == 2){
                        // echo "<tr><th>$line[0]</th>";
                            $temp = $line[20];
                            echo "<tr><th>Deceased: <td class='text-danger'>+$temp</td></th></tr>";
                            $x++;
                            continue;
                        }

                        if(3-$x == 1){
                            $temp = $line[20];
                            echo "<tr><th>Recovered: <td class='text-success'>+$temp</td></th></tr>";
                            $x++;
                            continue;
                        }

                        if(3-$x == 0){
                            $temp = $line[20];
                            echo "<tr><th>confirmed: <td class='text-danger'>+$temp</td></th></tr>";
                            $x=1;
                            continue;
                        }
                }
            ?>
            </tbody>
        </table>
        <table class="table table-hover shadow-lg" style="width: 40%">
            <thead>
                <tr>
                    <th colspan="2" class="text-center table-dark">Yesterday</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $fp = fopen(__DIR__."\\..\\records\\states.csv", "r");
                if(!$fp){
                    die();
                }
                $arr = [];
                for($i=0; !feof($fp); $i++){
                $arr[$i] = fgets($fp);
                }
                $count = count($arr) - 1;
                $x=1;
                for($i=($count-3), $j=0; $j<3; $j++, $i--){
                    $line = $arr[$i];
                    $line = explode(",", $line);
                    // echo $arr[$i];
                    if(3-$x == 2){
                        // echo "<tr><th>$line[0]</th>";
                            $temp = $line[20];
                            echo "<tr><th>Deceased: <td class='text-danger'>+$temp</td></th></tr>";
                            $x++;
                            continue;
                        }

                        if(3-$x == 1){
                            $temp = $line[20];
                            echo "<tr><th>Recovered: <td class='text-success'>+$temp</td></th></tr>";
                            $x++;
                            continue;
                        }

                        if(3-$x == 0){
                            $temp = $line[20];
                            echo "<tr><th>confirmed: <td class='text-danger'>+$temp</td></th></tr>";
                            $x=1;
                            continue;
                        }
                }
            ?>
            </tbody>
        </table>
    </div>

    <h3 class="my-2"><a href="/India/state/Tamilnadu" class="text-dark">TamilNadu:</a></h3>
    <div class="d-flex justify-content-between">
        <table class="table table-hover shadow-lg" style="width: 40%">
            <thead>
                <tr>
                    <th colspan="2" class="text-center table-dark">Today</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $fp = fopen(__DIR__."\\..\\records\\states.csv", "r");
                if(!$fp){
                    die();
                }
                $arr = [];
                for($i=0; !feof($fp); $i++){
                $arr[$i] = fgets($fp);
                }
                $count = count($arr) - 1;
                $x=1;
                for($i=($count), $j=0; $j<3; $j++, $i--){
                    $line = $arr[$i];
                    $line = explode(",", $line);
                    // echo $arr[$i];
                    if(3-$x == 2){
                        // echo "<tr><th>$line[0]</th>";
                            $temp = $line[35];
                            echo "<tr><th>Deceased: <td class='text-danger'>+$temp</td></th></tr>";
                            $x++;
                            continue;
                        }

                        if(3-$x == 1){
                            $temp = $line[35];
                            echo "<tr><th>Recovered: <td class='text-success'>+$temp</td></th></tr>";
                            $x++;
                            continue;
                        }

                        if(3-$x == 0){
                            $temp = $line[35];
                            echo "<tr><th>confirmed: <td class='text-danger'>+$temp</td></th></tr>";
                            $x=1;
                            continue;
                        }
                }
            ?>
            </tbody>
        </table>
        <table class="table table-hover shadow-lg" style="width: 40%">
            <thead>
                <tr>
                    <th colspan="2" class="text-center table-dark">Yesterday</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $fp = fopen(__DIR__."\\..\\records\\states.csv", "r");
                if(!$fp){
                    die();
                }
                $arr = [];
                for($i=0; !feof($fp); $i++){
                $arr[$i] = fgets($fp);
                }
                $count = count($arr) - 1;
                $x=1;
                for($i=($count-3), $j=0; $j<3; $j++, $i--){
                    $line = $arr[$i];
                    $line = explode(",", $line);
                    // echo $arr[$i];
                    if(3-$x == 2){
                        // echo "<tr><th>$line[0]</th>";
                            $temp = $line[35];
                            echo "<tr><th>Deceased: <td class='text-danger'>+$temp</td></th></tr>";
                            $x++;
                            continue;
                        }

                        if(3-$x == 1){
                            $temp = $line[35];
                            echo "<tr><th>Recovered: <td class='text-success'>+$temp</td></th></tr>";
                            $x++;
                            continue;
                        }

                        if(3-$x == 0){
                            $temp = $line[35];
                            echo "<tr><th>confirmed: <td class='text-danger'>+$temp</td></th></tr>";
                            $x=1;
                            continue;
                        }
                }
            ?>
            </tbody>
        </table>
    </div>

    <h3 class="my-2"><a href="/India/state/Maharashtra" class="text-dark">Maharashtra:</a></h3>
    <div class="d-flex justify-content-between">
        <table class="table table-hover shadow-lg" style="width: 40%">
            <thead>
                <tr>
                    <th colspan="2" class="text-center table-dark">Today</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $fp = fopen(__DIR__."\\..\\records\\states.csv", "r");
                if(!$fp){
                    die();
                }
                $arr = [];
                for($i=0; !feof($fp); $i++){
                $arr[$i] = fgets($fp);
                }
                $count = count($arr) - 1;
                $x=1;
                for($i=($count), $j=0; $j<3; $j++, $i--){
                    $line = $arr[$i];
                    $line = explode(",", $line);
                    // echo $arr[$i];
                    if(3-$x == 2){
                        // echo "<tr><th>$line[0]</th>";
                            $temp = $line[25];
                            echo "<tr><th>Deceased: <td class='text-danger'>+$temp</td></th></tr>";
                            $x++;
                            continue;
                        }

                        if(3-$x == 1){
                            $temp = $line[25];
                            echo "<tr><th>Recovered: <td class='text-success'>+$temp</td></th></tr>";
                            $x++;
                            continue;
                        }

                        if(3-$x == 0){
                            $temp = $line[25];
                            echo "<tr><th>confirmed: <td class='text-danger'>+$temp</td></th></tr>";
                            $x=1;
                            continue;
                        }
                }
            ?>
            </tbody>
        </table>
        <table class="table table-hover shadow-lg" style="width: 40%">
            <thead>
                <tr>
                    <th colspan="2" class="text-center table-dark">Yesterday</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $fp = fopen(__DIR__."\\..\\records\\states.csv", "r");
                if(!$fp){
                    die();
                }
                $arr = [];
                for($i=0; !feof($fp); $i++){
                $arr[$i] = fgets($fp);
                }
                $count = count($arr) - 1;
                $x=1;
                for($i=($count-3), $j=0; $j<3; $j++, $i--){
                    $line = $arr[$i];
                    $line = explode(",", $line);
                    // echo $arr[$i];
                    if(3-$x == 2){
                        // echo "<tr><th>$line[0]</th>";
                            $temp = $line[25];
                            echo "<tr><th>Deceased: <td class='text-danger'>+$temp</td></th></tr>";
                            $x++;
                            continue;
                        }

                        if(3-$x == 1){
                            $temp = $line[25];
                            echo "<tr><th>Recovered: <td class='text-success'>+$temp</td></th></tr>";
                            $x++;
                            continue;
                        }

                        if(3-$x == 0){
                            $temp = $line[25];
                            echo "<tr><th>confirmed: <td class='text-danger'>+$temp</td></th></tr>";
                            $x=1;
                            continue;
                        }
                }
            ?>
            </tbody>
        </table>
    </div>
</div>

<?php
//setting the default timezone to india kolata
date_default_timezone_set("Asia/kolkata");

//checking the lastModified for the dailyrecords file
$lastChanged = date_create(date("h:i:s a", filemtime("./../records/dailyrecords.csv")));

//updating content every 30mins
$lastChanged = date_add($lastChanged,date_interval_create_from_date_string("30 mins"));
$new = date_format($lastChanged, "h:i:s a");
$new = strtotime($new);

//if new time == current time then update the file
if(date("h:i a", $new) == date("h:i a")){
    include_once __DIR__."/../filedownloads.php";
}

$date1 = date_create(date("h:i:s", filemtime("./../records/dailyrecords.csv")));
$date2 = date_create(date("h:i:s"));

// sometimes file won't update due to delayed reload
$diff = date_diff($date1, $date2);
$diff = $diff->i;
if($diff > 35){ // if diff is greater than 35 mins then update file
    include_once __DIR__."/../filedownloads.php";
}
echo "<small>Last updated $diff minutes ago.</small>";
