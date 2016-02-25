<table border="1" width="100%" class="userList">
    <tr id ="headerList">
        <td>№</td>
        <td>id</td>
        <td>CPU</td>
        <td>RAM</td>
        <td>OS</td>
        <td>Speed</td>
    </tr>
    <?php
    /*
    <tr>
        <td>1</td>
        <td>fe6340be87fd5e43b7f0cac5741e76205dd69a68b2024fda16c696848a720f7a</td>
        <td>i5 4690K</td>
        <td>8 GB</td>
        <td>Win 7</td>
        <td>50 mb/s</td>
    </tr>

    <tr>
        <td><?php echo "№";?></td>
        <td ><?php echo $data['data']['id']?></td>
        <td><?php echo $data['data']['CPU']?></td>
        <td><?php echo $data['data']['RAM']?></td>
        <td><?php echo $data['data']['OS']?></td>
        <td><?php echo $data['data']['Speed']?></td>
    </tr> */?>
    <?php
        foreach($data['data'] as $key => $row )
        {
            echo "<tr>
                    <td>".$key."</td>
                    <td>".$row['id']."</td>
                    <td>".$row['CPU']."</td>
                    <td>".$row['RAM']."</td>
                    <td>".$row['OS']."</td>
                    <td>".$row['Speed']."</td>
                </tr>";
        }
    ?>
    <tr>
        <td colspan='7'>
            <?php
            $count = ceil($data['count']/10);
            for ($i = 1; $i<=$count; $i++)
            {
                echo "<div style='display: inline-block;margin-right: 5px;;'><a href='userList/index/?page=".$i."'>".$i."</a></div>";
            }
            ?>
        </td>
    </tr>
</table>