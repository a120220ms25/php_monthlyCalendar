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

// $arr = [
//   "Keep on going never give up.",
//   "Never put off what you can do today until tomorrow.",
//   "Believe in yourself.",
//   "You think you can, you can.",
//   "I can because i think i can.",
//   "Action speak louder than words.",
//   "Never say die.",
//   "Winners do what losers don't want to do.",
//   "Jack of all trades and master of none.",
//   "Wasting time is robbing oneself.",
//   "Judge not from appearances.",
//   "Whatever is worth doing is worth doing well."
// ];

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
    $today = date('d',$nowStr);
    // echo $today;

    switch ($month) {
      case '01':
         $month='January';
        break;
        case '02':
          $month='February';
         break;
         case '03':
          $month='March';
         break;
         case '04':
          $month='April';
         break;
         case '05':
          $month='May';
         break;
         case '06':
          $month='June';
         break;
         case '07':
          $month='July';
         break;
         case '08':
          $month='August';
         break;
         case '09':
          $month='September';
         break;
         case '10':
          $month='October';
         break;
         case '11':
          $month='November';
         break;
         case '12':
          $month='December';
         break;
      
      default:
        # code...
        break;
    }



     ?>

  <?php $changeMonth=str_pad($month, 2, "0", STR_PAD_LEFT);?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Allura&family=Yomogi&display=swap" rel="stylesheet">
        <title>Monthly calendar</title>
  </head>
  <body>
    <div class="container">
      <div class="row ">
        <!-- 現在月份區塊 -->
        <div class="col-lg-4 pre">
          <div class="preBox monthBox pb-2 mb-5">
          <a class="backNow " href="./?year=<?=$yearStr;?>&month=<?=$monthStr;?>">Back now
        <?=$yearStr?>/<?=$monthStr?>/<?=$today?></a>
            <div class="preSub">
                <a class="arrowLeft d-lg-none" href="?year=<?=$preYear;?>&month=<?=$preMonth;?>">
                <i class="fal fa-caret-left"></i></a>
                <div class="nextMonth  fs-2 pt-1 pb-lg-3 d-inline-block "><?= $changeMonth?></div>
                <a class="arrowRight d-lg-none" href="?year=<?=$nextYear.'&month='.$nextMonth?>">
                <i class="fal fa-caret-right"></i></a>
            </div>
   
          <table class=" w-100 ">
          <!-- <tr width="80% tableTitle">
              <td>SUN</td>
              <td>MON</td>
              <td>TUE</td>
              <td>WED</td>
              <td>THU</td>
              <td>FRI</td>
              <td>SAT</td>
          </tr> -->
    <?php for($i=1;$i<=6;$i++) :?>

    <tr  >
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
    <!-- <tr>
      <td colspan="7"> <?=$arr[$month-1]; ?></td>
    </tr> -->
  
          </table>
        </div>
          </div>
         <!-- 圖片跟title的部分 -->
        <div class="col-lg-4 main ">
        <h1 class="text-center d-lg-none fs-2"><?= $year?><br>Monthly calendar</h1>
            <div class="d-none d-lg-block imgBoxPc"></div>
            <div class="imgBox mb-1 d-lg-none"></div>
            <div class="div d-flex justify-content-between">
                <a class="d-none d-lg-block arrowLeft " href="?year=<?=$preYear;?>&month=<?=$preMonth;?>">
                    <i class="fal fa-caret-left"></i></a>
                <h1 class="text-center d-none d-lg-inline-block fs-4"><?= $year?> Monthly calendar</h1>
                <a class="arrowRight d-none d-lg-block" href="?year=<?=$nextYear.'&month='.$nextMonth?>">
                    <i class="fal fa-caret-right"></i></a>

            </div>
          
        </div>

    </div>

  
 <script>
let num = Math.floor(Math.random()*12)+1;
// console.log(num);
let imgBox =document.querySelector('.imgBox').style=`background-image: url(./img/${num}.jpg)`;
console.log(document.querySelector('.imgBox').style);

let imgBoxPc =document.querySelector('.imgBoxPc').style=`background-image: url(./img/${num}.jpg)`;
console.log(document.querySelector('.imgBox').style);

 </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>






