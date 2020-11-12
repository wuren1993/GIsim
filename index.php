<?php
    $DataFilepath = "ArtifactsData.txt";
    $ArtifactsData = file($DataFilepath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    $sets =  explode(",",$ArtifactsData[0]);
    $types =  explode(",",$ArtifactsData[1]);

?>


<!DOCTYPE html>                         
<html lang="zh-cmn-Hans">                    
<head>                                 
    <meta charset="utf-8">            
    <title>GIsim</title>            
</head>                                

<body>                                 

<a href="http://www.baidu.com">百度</a> 

<form method="POST" action="">
<table>

    <tr>
        <th>Rarity</th><th>Lv</th><th>Set</th><th>Type</th><th>Name</th><th>Main</th><th>Sub1</th><th>Sub2</th><th>Sub3</th><th>Sub4</th>
    </tr>

    <tr>
        <td>
            <select name="rarity">
                <option value ="4">4</option>
                <option value ="5">5</option>
            </select>
        </td>
        <td>
            <select name="level">
                <option value ="0">0</option>
                <option value ="4">4</option>
                <option value="8">8</option>
                <option value="12">12</option>
                <option value="16">16</option>
                <option value="20">20</option>
            </select>
        </td>
        <td>
            <select name="set">
            <?php
                for($i =0;$i<count($sets);$i++){
                    echo "<option value =\"".$sets[$i]."\">".$sets[$i]."</option>";
                }
            ?>
            </select>
        </td>
        <td>
            <select name="type">
            <?php
                for($i =0;$i<count($types);$i++){
                    echo "<option value =\"".$types[$i]."\">".$types[$i]."</option>";
                }
            ?>
            </select>
        </td>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
    </tr>

</table>
            </form>
<br>

<script language="javascript">
    function Refresh()
    {
        this.form.submit(); 
    }
</script>

</body>                              
</html>   