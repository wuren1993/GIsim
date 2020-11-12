<?php
    $DataFilepath = 'ArtifactsData.txt';//圣痕数据
    $ArtifactsData = file($DataFilepath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $ArtifactsListPath = 'ArtifactsList.txt';//用户圣痕列表
    $ArtifactsList = file($ArtifactsListPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    $sets =  explode(",",$ArtifactsData[0]);//套装名
    $types =  explode(",",$ArtifactsData[1]);//部位类型

    AddToList($ArtifactsListPath);

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
    <?php
        ShowAritfacts($ArtifactsListPath);
    ?>
    <tr>
        <td>
            <select name="rarity">
                <option value ="4">4</option>
                <option value ="5">5</option>
            </select>
        </td>
        <td>
            <select name="level">
                <?php
                    for($i =0;$i<=20;$i++){
                        echo "<option value =\"".$i."\">".$i."</option>";
                    }
                ?>
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
        <?php
            StatusSelector();
        ?>        
    </tr>

    </table>
    <br><button type="submit">添加</button>
</form>


<script language="javascript">
    function Refresh(){
        this.form.submit();
    }
    function AddArtifact(){
        $newArtifact[9];

        this.form.submit();
    }

</script>

</body>                              
</html>

<?php
    function ShowAritfacts($filepss){        
        $List = file($filepss, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if($List==null)return;
        
        for($i =0;$i<count($List);$i++){
            $atf =  explode(",",$List[$i]);
            echo "<tr>";
            for($j =0;$j<count($atf);$j++){
                echo "<td>";
                echo $atf[$j];
                echo "</td>";
            }
            echo "<tr><br>";
        }
    }

    function AddToList($filepass){
        if($_POST["rarity"]==null||$_POST["level"]==null||$_POST["set"]==null||$_POST["type"]==null)
        return;

        $str =$_POST["rarity"].",".$_POST["level"].",".$_POST["set"].",".$_POST["type"].",".$_POST["main"].",".$_POST["mains"]."\n";
        file_put_contents($filepass, $str,FILE_APPEND|LOCK_EX);
    }

    function StatusSelector(){
        $statusType =["main","sub1","sub2","sub3","sub4","sub5"];
        
        foreach($statusType as $str){
            echo "<td>";
            StatusOption($str);
            echo "</td>";
        }
    }

    function StatusOption($str){
        echo "<select name=\"".$str."\">";
        echo     "<option value =\"atk\">攻击力</option>";
        echo     "<option value =\"atkp\">攻击力%</option>";
        echo     "<option value =\"hp\">生命值</option>";
        echo     "<option value =\"hpp\">生命值%</option>";
        echo     "<option value =\"def\">防御力</option>";
        echo     "<option value =\"defp\">防御力%</option>";
        echo     "<option value =\"erc\">元素充能</option>";
        echo     "<option value =\"emst\">元素精通</option>";
        echo     "<option value =\"crit\">暴击</option>";
        echo     "<option value =\"critd\">爆伤</option>";
        echo     "<option value =\"ed\">属性伤害</option>";
        echo     "<option value =\"phd\">物理伤害</option>";
        echo     "<option value =\"hb\">治疗加成</option>";              
        echo "</select>";
        echo "<input type=\"tel\" step=\"0.1\" name=\"".$str."s\" style=\"width:40px;\">";
    }
?>