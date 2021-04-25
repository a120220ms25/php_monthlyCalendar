<?php
if (empty($_GET['year']) && empty($_GET['month'])) {
    $now = time(); // 現在時間戳
    $days = date('t', $now);
    // echo $days;
    $month = date('m', $now);
    // echo $month;
    $year = date('Y', $now);
// echo $year;
} else {
    $month = $_GET['month'];
    //  echo $month;
    $year = $_GET['year'];
    //  echo $year;
}

$arr = [
  "Keep on going never give up.",
  "Never put off what you can do today until tomorrow.",
  "Believe in yourself.",
  "You think you can, you can.",
  "I can because i think i can.",
  "Action speak louder than words.",
  "Never say die.",
  "Winners do what losers don't want to do.",
  "Jack of all trades and master of none.",
  "Wasting time is robbing oneself.",
  "Judge not from appearances.",
  "Whatever is worth doing is worth doing well."
];

      // ex:date('w',時間戳)
      // Y - A four digit representation of a year
      // m - A numeric representation of a month (from 01 to 12)
      // w - A numeric representation of the day (0 for Sunday, 6 for Saturday)  抓出本月第一天是禮拜幾
      // t - The number of days in the given month
      // mktime(hour, minute, second, month, day, year, is_dst) 抓出這個月有幾天
     
      // $dayStr = (($i-1*7+$j)) - $firstDayWeek;
 
      // now
     
      // prev

      // next
      
      //get year
    //   $year = $_GET['year'];
    //   echo $year;
    //  //get month
    //   $month = $_GET['month'];
    //   echo $month;



      // 抓出現在時間
      // $now = time();
    
      // echo $nowTime;
      // $year = 2021;
      // $month = 05;
      
      // 抓出這個月的第一天
      // mktime 會抓出時間搓

      // 設定本月第一天
       $firstDayMonth = mktime(0, 0, 0, $month, 01, $year);
      //  echo $firstDayMonth;
       // 抓出本月有幾天
      $days = date('t', $firstDayMonth);
      //  抓出本月第一天是星期幾
      $firstDayWeek = date('w', $firstDayMonth);
      // var_dump($firstDayWeek);

     if ($month == 1) {
         $preYear = $year - 1;
         $preMonth = 12;
     } else {
         $preYear = $year;
         $preMonth = $month - 1;
     }
      
     if ($month == 12) {
         $nextYear = $year +1 ;
         $nextMonth = 1;
     } else {
         $nextYear = $year  ;
         $nextMonth = $month + 1;
     }
    $nowStr = time(); // 現在時間戳
    $days = date('t', $nowStr);
    // echo $days;
    $monthStr = date('m', $nowStr);
    // echo $month;
    $yearStr = date('Y', $nowStr);

   
     ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@100&family=Orelega+One&display=swap"
    rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">
  </header>

<body>
  <!-- $preYear $preMonth -->
  <a class="arrowLeft" href=" ./time.php?year=<?=$preYear;?>&month=<?=$preMonth;?>"></a>
  <a class="arrowRight" href=" ./time.php?year=<?=$nextYear.'&month='.$nextMonth?>"></a>
  <?php $changeMonth=str_pad($month, 2, "0", STR_PAD_LEFT);?>

  <div class="container">
    <h1 class="month"><?=$changeMonth ?></h1><img src="./img/demo01.jpg" alt="月曆背景">
    <h1>Monthly Calendar</h1>
    <h3><?=$year.' 年'?></h3>
    <a class="now" href="./time.php?year=<?=$yearStr;?>&month=<?=$monthStr;?>"></a>
    <table>
      <tr width="80%">
        <td>SUN</td>
        <td>MON</td>
        <td>TUE</td>
        <td>WED</td>
        <td>THU</td>
        <td>FRI</td>
        <td>SAT</td>
      </tr><?php for ($i=1; $i<=6; $i++) :?><tr><?php for ($j=1; $j<=7; $j++) {
         $dayStr=(($i-1)*7+$j) - $firstDayWeek; //算出每個格子內的日期

         if ($i==1) {

      //判斷first row 處理第一天
             if ($dayStr > 0) {
                 //日期為一號以後會顯示
                 echo "<td>$dayStr</td>";
             } else {
                 // dayStr 0以下 該格無資料
                 echo "<td></td>";
             }
         } else {

      // row2後的處理
             if ($dayStr<=$days) {
                 echo "<td>$dayStr</td>";
             } else {
                 if ($j==1) {
                     break;
                 }

                 echo "<td></td>";
             }
         }

    ;
     }

  ;
  ?></tr><?php endfor;
  ?><tr>
        <td class="sentence" colspan="7"><?=$arr[$month-1];
  ?></td>
      </tr>
    </table>
  </div>
</body>

</html><?php ?>