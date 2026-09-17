<?php
$n = 13;
$spcCnt = 4;
$starsCnt =1;
echo"<table>";
for ($i = 0; $i <= $n; $i++) {
    echo"<tr>";
    if($i == 0 || $i == 12){
        for ($j = 0; $j < 9; $j++) {
            if($j%2 ==0 ) echo "<td>&nbsp;|&nbsp;</td>";
            else echo "<td>@</td>";
        }
    }else if($i==1 || $i == 11){
        for ($j = 0; $j < 9; $j++) {
            echo "<td>@</td>";
        }
    }else if($i < 11){
        if($i==7){
            $spcCnt =1;
            $starsCnt = 4;
        }
        $inStartCnt = 0;
        $inEndCnt = 0;
        for ($j = 0; $j < 9; $j++) {
            if($i < 7){
                if($j < $spcCnt)
                    echo "<td>&nbsp;</td>";
                else if($inStartCnt < $starsCnt){
                    echo "<td>@</td>"; 
                    $inStartCnt++;
                }else if($inEndCnt < $starsCnt-1){
                    echo "<td>@</td>"; 
                    $inEndCnt++;
                }
                else
                    echo "<td>&nbsp;</td>";     
            }else{
                if($j < $spcCnt)
                    echo "<td>&nbsp;</td>";
                else if($inStartCnt < $starsCnt){
                    echo "<td>@</td>"; 
                    $inStartCnt++;
                }else if($inEndCnt < $starsCnt-1){
                    echo " <td>@</td>"; 
                    $inEndCnt++;
                }
                else
                    echo "<td>&nbsp;</td>"; 
            }
        }   
        
        if($i < 7){
            $spcCnt--;
            $starsCnt++;
        }else{
            $spcCnt++;
            $starsCnt--;
        }
    }
    echo "</tr>";
}
echo "</table>";

?>