<?php

include 'config.php';

$header = implode("",file("templates/t_header.html"));
$content = implode("",file("templates/t_index.html"));
$footer = implode("",file("templates/t_footer.html"));

$header =  str_replace("--TITLE--","Index", $header);

$sql = " SELECT * FROM users";
$query = mysqli_query($conn, $sql);

$td_start = strpos($content,"<!--TD-START-->");
$td_end = strpos($content,"<!--TD-END-->");
$td_data = substr($content, $td_start, $td_end - $td_start);

$td_end1 = strpos($content,"<!--TD-END-->");
$tr_start = strpos($content,"<!--TR-END-->");
$td_data1 = substr($content, $td_end1, $tr_start - $td_end1);
$temp_td = "";
$final_td = "";

$td_s = '';
$td_e = '';

$num = mysqli_num_rows($query);
if ($num > 0)
{   
    $counter = 1;    
    while ($row = mysqli_fetch_assoc($query)) 
    {               
        // $row = implode(',', $row);
        
        print_r($row);        

        $temp_td = $td_data;        
        $temp_td = str_replace("<!--TD-START-->", $td_s, $temp_td);
        $temp_td = str_replace("--COUNTER--", $counter, $temp_td);
        $temp_td = str_replace("--USER--", $row['user'], $temp_td);
        $temp_td = str_replace("--EMAIL--", $row['email'], $temp_td);        
        $temp_td = str_replace("<!--TD-END-->", $td_e, $temp_td);        
        $final_td .= $temp_td;
        
        if ($counter % 3 == 0) {   
            $final_td .= $td_data1;
        } 
        $counter++; 
        
        // echo $final_tr;
        // echo $final_td;
    }
    $content = str_replace($td_data,$final_td,$content);
}


$source = $header.$content.$footer;
echo $source;

// $data = array();
// array_push($data, $final_tr);

// echo "<table><tr>";
// foreach ($data as $index => $value) {
//     if ($index % 3 == 0 && $index != 0) {
//         echo "</tr><tr>"; // Start a new row for each set of three columns
//     }
//     echo "<td>$value</td>";
//     print_r($value);
// }
// echo "</tr></table>";

?>