<?php
/**
 * Created by PhpStorm.
 * User: MarcT
 * Date: 17/02/2018
 * Time: 23:52
 */
function convert($input)
{
    $newData = array();
    $newData2 = array();
    $firstLine = true;
    $holder[] = ['date', 'followers', 'views'];

    foreach ($input as $dataRow)
    {
        if ($firstLine)
        {
            $newData[] = array_keys($dataRow);
            $firstLine = false;
        }

        $newData[] = array_values($dataRow);
    }
    array_shift($newData);

for($i = 0; $i < count($newData, COUNT_RECURSIVE) - 1; $i++)
{

    //$newData2[] = (int)substr($newData[0][$i]->date, 5);
    //$newData2[] = (int)$newData[0][$i]->followers;
    //$newData2[] = (int)$newData[0][$i]->views;
    array_push($newData2, $newData[0][$i]->date);
    array_push($newData2, (int)$newData[0][$i]->followers);
    array_push($newData2, (int)$newData[0][$i]->views);
    $holder[] = $newData2;
    //var_dump($holder);
    $newData2 = array();
}
    return $holder;
}
if(isset($_GET['user']))
{
    $user = $_GET['user'];

    $json = file_get_contents('https://api.itslit.uk/User/profile/' . $user);
    $data = json_decode($json);

    
    $maindata = get_object_vars($data);
    $status = array_shift($maindata);
    $title = array_shift($maindata['response']);
//var_dump($maindata);die;
//var_dump(convert($maindata));die;
}
?>
<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable((<?= json_encode(convert($maindata)); ?>));

            var options = {
                title: 'View Statistics',
                hAxis: {title: 'Date',  titleTextStyle: {color: '#333'}},
                vAxis: {minValue: 0}

            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>
<div id="chart_div" style="width: 100%; height: 500px;"></div>
</body>
</html>

