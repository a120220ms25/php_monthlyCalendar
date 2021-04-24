<?php
if(empty($_GET['year']) && empty($_GET['month'])){
        $now = time(); // 現在時間戳
        $days = date('t',$now);
        // echo $days;
        $month = date('m',$now);
        // echo $month;
        $year = date('Y',$now);
        // echo $year;
      }else{
         $month = $_GET['month'];
        //  echo $month;
         $year = $_GET['year'];
        //  echo $year;
      }

      
$arr = [
  "01",
  "2",
  "3eeeeeeeeeeeeeeeeeeeeeeeeeee",
  "4eeeeeeeeee",
  "5eeeeeeeeeeee",
  "6eeeeeeeeeeeeeeeeeeeeeeeeeeeeee",
  "7eeeeeeeeeeeeeeeeeeeeeeeeeee",
  "8eeeeeeeeeeeeeeeeeeeeeeeeeee",
  "9eeeeeeeeeeeeeeeeeeeeeeeeeeee",
  "10eeeeeeeeeeeeeeeeeeeeeeeee",
  "11eeeeeeeeeeeeeeeeeeeeeeeeeee",
  "12eeeeeeeeeeeeeeeeeee"
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
       $firstDayMonth = mktime(0,0,0,$month,01,$year);
      //  echo $firstDayMonth; 
       // 抓出本月有幾天
      $days = date('t',$firstDayMonth);
      //  抓出本月第一天是星期幾
      $firstDayWeek = date('w',$firstDayMonth);
      // var_dump($firstDayWeek);

     if($month == 1){
        $preYear = $year - 1;
        $preMonth = 12;
      }else {
        $preYear = $year;
        $preMonth = $month - 1;
      }
      
     if($month == 12){
      $nextYear = $year +1 ;
      $nextMonth = 1;
    }else {
      $nextYear = $year  ;
      $nextMonth = $month + 1;
    }
    $nowStr = time(); // 現在時間戳
    $days = date('t',$nowStr);
    // echo $days;
    $monthStr = date('m',$nowStr);
    // echo $month;
    $yearStr = date('Y',$nowStr);

   
     ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Monthly Calendar</h1>
  <?php $changeMonth = str_pad($month,2,"0",STR_PAD_LEFT); ?>
  <h3><?= $year.'年'.$changeMonth.'月' ?></h3>
  <h3>
    <!-- $preYear $preMonth -->
    <a href="./time.php?year=<?=$preYear;?>&month=<?=$preMonth;?>">pre</a>
    <a href="./time.php?year=<?=$yearStr;?>&month=<?=$monthStr;?>">now</a>
    <!-- <a href="./time.php">now</a> -->
    <a href="./time.php?year=<?=$nextYear.'&month='.$nextMonth?>">next</a>
  </h3>
 
  <table border="1">
    <tr width="80%">
      <td>星期日</td>
      <td>星期一</td>
      <td>星期二</td>
      <td>星期三</td>
      <td>星期四</td>
      <td>星期五</td>
      <td>星期六</td>
    </tr>
    <?php for($i=1;$i<=6;$i++) :?>
    
    <tr>
      <?php 
      for($j=1;$j<=7;$j++){
        $dayStr = (($i-1)*7+$j) - $firstDayWeek; //算出每個格子內的日期
        if($i == 1){ //判斷first row 處理第一天
          if($dayStr > 0) {
            //日期為一號以後會顯示
            echo "<td>$dayStr</td>";
          }else{
            // dayStr 0以下 該格無資料
            echo "<td></td>";
          }
        }else{
            // row2後的處理
            if($dayStr<=$days){
                echo "<td>$dayStr</td>";
            }else {
              if($j == 1){
                break;
              }
              echo "<td></td>";
              
            }
          
          };
        };
      ?>
    </tr>
    <?php endfor; ?>
    <tr>
    <td colspan="7"> <?=$arr[$month-1]; ?></td>  
   </tr>
  </table>


</body>
</html>
<?php

?>