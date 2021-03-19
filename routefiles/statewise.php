<?php
$state = isset($_POST['states']) ? $_POST['states'] : '';
$fp = fopen(__DIR__."\\..\\records\\states.csv", "r");
if(!$fp){
    echo "File could not be opened";
}
// if($state == false){
//     echo "Not a valid state";
//     return false;
// }
$arr = [];
for($i=0; !feof($fp); $i++){
$arr[$i] = fgets($fp);
}
$count = count($arr) - 1;
$states = [];
$stateLine = explode(",", $arr[0]);
for($i=0; $i<count($stateLine); $i++){
    $states[$stateLine[$i]] = $i;
}

$today = $arr[$count - 2];
$today = explode(",", $today);
$value = isset($_POST['options']) ? $_POST['options'] : 10;
if($value === "Alltime"){
    $value = ($count / 3)-1;
}else if($value == 10 || $value == 30 || $value == 90){
    $value = $value * 3;
}else{
    echo "Select a valid option!";
    $value = 10*3;
}
?>

<div class="container-fluid">
        <div class="my-2">
            <form action="" method="post">
                <label for="options">Filter result:</label>
                <select name="options" id="options" class="btn btn-secondary btn-sm">
                    <option value="10">Last 10 days</option>
                    <option value="30">Last 30 days</option>
                    <option value="90">Last 90 days</option>
                    <option value="Alltime">Alltime</option>
                </select>
                <input type="submit" name="submit" class="btn btn-outline-primary btn-sm" value="search">
            </form>
        </div>
        <table class="table table-light table-hover table-striped table-bordered border-light">
            <thead class="table-dark">
                <th>Date</th>
                <th class="text-danger">(+)Deceased</th>
                <th class="text-success">(+)Recovered</th>
                <th class="text-danger">(+)Newly Confirmed</th>
            </thead>
            <tbody>
                <?php
                    $x=1;
                    echo "<tr>";
                    // echo "<th>$line[0]</th>";
                    for($i=$count, $j=0; $j<($value); $j++, $i--){
                        $line = $arr[$i];
                        $line = explode(",", $line);
                        // echo $line[$states[$state]];
                        if(3-$x == 2){
                        echo "<th>$line[0]</th>";
                            $temp = $line[$states["KA"]];
                            echo "<th>Deceased: $temp</th>";
                            $x++;
                            continue;
                        }

                        if(3-$x == 1){
                            $temp = $line[$states["KA"]];
                            echo "<th>Recovered: $temp</th>";
                            $x++;
                            continue;
                        }

                        if(3-$x == 0){
                            $temp = $line[$states["KA"]];
                            echo "<th>Confirmed: $temp</th></tr>";
                            $x=1;
                            continue;
                        }

                    }
                ?>
            </tbody>
        </table>
    </div>

