<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>萬年曆</title>
    <style>
        *{
            box-sizing:border-box;
            margin:0;
            padding:0;
        }  
        body{
            background-image: url(./bg.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            width: 100vw;
            height: 100vh;
            top: 0;
            left: 0;
            z-index: -12;
            font-family: 'Montserrat', '標楷體';
            font-weight: bold;
            color: white;
            margin: 0;
            padding: 0;
            box-sizing:border-box;
        }
        #title{
            color: black;
            text-align: center;
        }
        #main{
            width: 1024px;
            height: 680px;
            margin: auto;
            margin-top: 20px;
            border-radius: 15px;
            position: relative;
            background-image: url(./bgg.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            box-shadow: 10px 10px 5px #888888;
        }

        #daily{
            background-color: rgba( 0, 0, 128, 0.6);
            border-radius: 15px;
            height: 680px;
            width: 300px;
            display: inline-block;
            position: absolute;
        }
        #mainTitle{
            text-align: center;
            font-size: 40px;
            margin-top: 100px;
        }
        #mainTD{
            text-align: center;
            font-size: 150px;
            padding-top: 0px;
            margin-top: 20px;
            padding-top: 50px
        }
        #mainW{
            margin: 0; 
            margin-top: -25px;
            text-align: center;
            font-size: 30px;
        }


        #calandar{
            height: 680px;
            width: 620px;
            display: inline-block;
            position: absolute;
            left:300px;
            padding-top:150px;
            box-sizing: border-box;
        }
        table{
            margin: auto;
            border-collapse: collapse;
        }
        td{
            width: 80px;
            height: 75px;
            padding: 3px;
            position:relative;
            text-align:center;
            vertical-align:top;
        }
        td div:nth-child(2){
          position:absolute;
          top:calc( 50% - 10px ); /*單一欄位的高度-自身的高度的一半*/
          width:100%;
          text-align:center;
        }
        .sp{
            background-color: rgba( 205, 51, 51, 0.8);
            border-radius: 10px;
        }
        .td{
            background-color: rgba( 102, 205, 170, 0.8);
            border-radius: 10px;
        }
        #BD{
            background-color: rgba( 255, 255, 255, 0.8);
            background-image: url(./bd.png);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            color: 	black;
            width: 80px;
            height: 50px;
            top: 0;
            left: 0;
            z-index: -1;
            border-radius:10px
        }
        td:hover{
            background-color: rgba( 198, 226, 255, 0.6);
            transition: all 0.5s;
            border-radius: 10px;
        }

        #year{
            background-color: rgba(25, 25, 112, 0.7);
            height: 680px;
            width: 104px;
            display: inline-block;
            position: absolute;
            left: 920px;
            text-align: center;
            padding-top: 180px;
            box-sizing: border-box;
            border-radius: 10px;
        }
        #link{
            width: 104px;
            height: 40px;
            background-color: #68228B;
            border-radius: 5px;
            line-height: 40px;
            margin-top: 10px;
        }
        a{
            color: white;
            text-decoration: none;
        }
        #link:active{
            background-color: black;
        }
        #sed{
            width: 100%;
            margin: auto;
            margin-top: 100px;
            margin-left: 100px;
        }
        #ip{
            width: 50px;
            background-color: rgba( 255, 255, 255, 0.7);
            border: 2px solid black;
            border-radius: 5px;        
        }
        #send{
            margin-top: 5px;
            width: 60px;
            background-color: rgba( 0, 191, 255, 0.7);
            border: 2px solid black;
            border-radius: 5px;        
        }
        
    </style>
</head>
<body>
    <?php
    if( !empty( $_GET[ 'month'])){
        $month= $_GET[ 'month'];
    }else{
    $month= date("n");   
    }
    if( !empty( $_GET[ 'year'])){
        $year= $_GET[ 'year'];
    }else{
    $year= date("Y");   
    }
    ?>
    <h1 id="title">萬年曆</h1>
    <div id="main">
        <div id="daily">
            <p id="mainTitle"> Today</p>
            <p id="mainTD"><?= date("d")?></p>
            <p id="mainW"><?= date("l")?></p>
            <div id="sed">
                <p>Search Day</p>
                <form action="index.php" method="GET">
                    <input id="ip" type="text" name="year" value="">　Year (yyyy)
                    <br>
                    <input id="ip" type="text" name="month" value="">　Month (m)
                    <br>
                    <input id="send" type="submit" value="search">
                    <input id="send" type="reset" value="clear">
                </form>
            </div>
        </div>
        <div id="calandar">
        <?php
    
            echo "<table  style='text-align: center'>";
            echo "<tr><td class='w'>日</td>";
            echo "<td class='w'>一</td>";
            echo "<td class='w'>二</td>";
            echo "<td class='w'>三</td>";
            echo "<td class='w'>四</td>";
            echo "<td class='w'>五</td>";
            echo "<td class='w'>六</td></<tr>";
    
   
            $start= "$year-$month-01";
            $today= date('Y-n-j');
            $sd=[
                1=>[ 1=> "元旦"],
                2=>[ 28=> "和平紀念日"],
                3=>[ 8=> "婦女節"],
                4=>[ 4=> "兒童節", 5=> "清明節"],
                5=>[ 1=> "勞動節"],
                6=>[ 7=> "端午節"],
                9=>[ 8=> "啟祥生日", 13=> "中秋節"],
                10=>[ 10=> "國慶日", 25=> "光復節",],
                12=>[ 25=> "行憲紀念日"]
            ];
            $startDay= date( "w", strtotime( $start));
            $days= 1;
            ?>
            <div style="margin-top:20px;">　　<?= $year?>年<?= $month?>月</div>
            <?php
            $dayTop= date("t",strtotime( $start));
            
            for( $i= 0; $i< 6; $i++){
                echo"<tr>";
                if( $i == 0){
                    for( $j= 0; $j< 7; $j++){
                        if( $j>= $startDay){
                            if( !empty( $sd[ $month][ $days])){
                                $str=$sd[ $month][ $days];
                                if( ( $sd[ $month][ $days]) == "啟祥生日"){
                                    echo "<td id='BD'><div>" . $days . "</div><div>" . $str . "</div></td>";
                                }else{
                                    echo "<td class='sp'><div>" . $days . "</div><div>" . $str . "</div></td>";
                                }
                            }else if( ( "$year-$month-$days") == date( "Y-n-j")){
                                echo "<td class='td'><div>" . $days . "</div><div>" . $str . "</div></td>";
                            }else{
                                echo "<td><div>" . $days . "</div><div>　</div></td>";
                            }
                            $str="";
                            $days++;
                        }else{
                            echo "<td></td>";
                        }
                    }
                }else{
                    for( $k= 0; $k< 7; $k++){                
                        if( $days > $dayTop){
                            echo "<td></td>";
                        }else{
                            if( !empty( $sd[ $month][ $days])){
                                $str=$sd[ $month][ $days];
                                if( ( $sd[ $month][ $days]) == "啟祥生日"){
                                    echo "<td id='BD'><div>" . $days . "</div><div>" . $str . "</div></td>";
                                }else{
                                    echo "<td class='sp'><div>" . $days . "</div><div>" . $str . "</div></td>";
                                }
                            }else if( ( "$year-$month-$days") == date( "Y-n-j")){
                                echo "<td class='td'><div>" . $days . "</div><div>" . $str . "</div></td>";
                            }else{
                                $str="";
                                echo "<td ><div>" . $days . "</div><div>　</div></td>";
                            }
                            $str="";
                            $days++;                    
                        }
                    }    
                }
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>
        <div id="year">
            <p id="link"><a  href="?month=<?=$month;?>&year=<?=( $year- 1)?>">上一年</a></p>
            <p id="link"><a  href="?month=<?=$month;?>&year=<?=( $year+ 1)?>">下一年</a> </p>
            <p id="link"><a  href="?month=<?=$month;?>&year=<?=( date( "Y"));?>">今年</a></p>
            <?php
                if(( $month- 1)> 0){
                ?>
                    <p id="link"><a  href="?month=<?=( $month- 1);?>&year=<?=$year?>">上一月</a><br></p>
                <?php
                }else{
                ?>
                    <p id="link"><a  href="?month=<?=12;?>&year=<?=( $year- 1)?>">上一月</a><br></p>
                <?php
                }
                if(( $month+ 1)<= 12){
                ?>
                    <p id="link"><a  href="?month=<?=( $month+ 1);?>&year=<?=$year?>">下一月</a></p>
                <?php
                }else{
                ?>
                    <p id="link"><a  href="?month=<?=1;?>&year=<?=( $year+ 1)?>">下一月</a></p>
                <?php
                }
                ?>
                <p id="link"><a  href="?month=<?=(date('m'));?>&year=<?=(date('Y'));?>">今天</a> </p>

        </div>
        </div>
    </div>
    

</body>
</html>