<?php
include_once "../layouts/render.php";
$fp = fopen(__DIR__ . "\\..\\records\\dailyrecords.csv", "r");
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
$count = count($arr) - 1;


$value = isset($_POST['options']) ? $_POST['options'] : 10;
if($value === "Alltime"){
    $value = $count;
}else if($value == 10 || $value == 30 || $value == 90){
    $value;
}else{
    echo "Select a valid option!";
    $value = 10;
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
                <th class="text-danger">(+)Daily cases</th>
                <th>Total cases</th>
                <th class="text-success">(+)Daily recovery</th>
                <th>Total recovery</th>
                <th class="text-danger">(+)Daily deceased</th>
                <th>Total deceased</th>
                <th class="text-warning">Active cases</th>
            </thead>
            <tbody>
            <?php
            for($i=0; $i<$value; $i++){
                $line = explode(",", $arr[$i]);
                $line[3] = (int)$line[3];
                $line[5] = (int)$line[5];
                $line[7] = (int)$line[7];
                $active = ($line[3]-$line[5]-$line[7]);  
            ?>
                <tr>
                    <th><?=$line[1];?></th>
                    <td><?=$line[2];?></td>
                    <td><?=$line[3];?></td>
                    <td><?=$line[4];?></td>
                    <td><?=$line[5];?></td>
                    <td><?=$line[6];?></td>
                    <td><?=$line[7];?></td>
                    <td><small><?= $active;?></small></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="./../public/js/bootstrap.bundle.min.js"></script>
<?php
$arr = [];