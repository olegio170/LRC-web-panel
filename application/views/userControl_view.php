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
    .tableHeader
    {
        cursor: pointer;
    }
    .td-process
    {
        cursor: pointer;
    }
    #selectedProcessName
    {
        cursor: pointer;
        display: inline-block;
    }
    #selectedProcess
    {
        display: inline-block;
    }
</style>


<div class="block-overflow">
    <h3 align='center'>id: <div id='divId'><?php echo $data['data']['shaId'] ;?></div></h3>
</div>

<div id="filters" width="100%" style="margin-bottom: 20px">
    <h3>Filters</h3>
    <div id="selectedProcess">Selected process :<div id="selectedProcessName">None</div></div><br>
    <input type="checkbox" checked="checked" id="showWithoutText">Show without text
</div>

<table width="100%" style="table-layout:fixed;" id="keyboardTable">

    <?php echo $data['table'];?>
</table>

<script src="/js/jquery.js"></script>
<script src="/js/userControl.js"></script>

