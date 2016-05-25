<div class="block-overflow">
    <table border="1" width="100%" class="userList">
        <tr id ="headerList">
            <td width="5%">№</td>
            <td width="35%">id</td>
            <td width="15%">CPU</td>
            <td width="15%">RAM</td>
            <td width="15%">OS</td>
            <td width="15%">Speed</td>
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
        $users = $data['data'];
        foreach($users as $key => $row )
        {
            echo "<tr>
                        <td>".($key+1)."</td>
                        <td><a href='http://".$_SERVER['HTTP_HOST']."/userControl/index/?id=".$row['shaId']."'>".$row['shaId']."</a></td>
                        <td>".$row['CPU']."</td>
                        <td>".$row['RAM']."</td>
                        <td>".$row['OS']."</td>
                        <td>".$row['speed']."</td>
                    </tr>";
        }
        ?>
    </table>
        <?php

        for ($i = 1; $i<=$data['count']; $i++)
        {
            echo "<<div style='margin-top:15px; display: inline-block;margin-right: 5px;'><a href='http://".$_SERVER['HTTP_HOST']."/userList/index/?page=".$i."'>".$i."</a>></div>";
        }

        ?>
</div>