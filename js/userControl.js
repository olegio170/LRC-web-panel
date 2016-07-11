var ws;
var id = '8f51dfd14221bc7d6adaefdf0533bf9e2af2d21e1395c6085fdf76943734c271';
var clientObj = {
    isAnswer:false
}
var orderBy = '';
var process = '';
var conversely = false;
$(document).ready(function(){
    main();
});
//main();
function main (){
    defineFiltersHendler ();
    if (!window.WebSocket) {
        alert ('WebSocket is  unsupported in your browser!');
    }
    //connectToServer();
    $('.getButton').click(function(){
        if(clientObj['isAnswer']) {
            var request = $(this).attr('title');
            sendRequest(request, 'request');
            checkAnswerFromServer();
        }
    });

    var windowHeight = window.innerHeight
        || document.documentElement.clientHeight
        || document.body.clientHeight;

    window.onscroll = function() {
        var scrolled = window.pageYOffset || document.documentElement.scrollTop;
        var main = $("#main");
        if (scrolled >= windowHeight) {
            main.addClass('hugeWidth');
        }
        else {
            main.removeClass('hugeWidth');
        }
    };


}
function defineFiltersHendler () {
    $("#showWithoutText").change(function () {
        getData();
    });
    $(".tableHeader").click(function () {
        var name = $(this).attr('name');
        if(name === orderBy) {
            if(conversely) {
                conversely = false;
            }
            else {
                conversely = true;
            }
        }
        else  {
            orderBy = name;
            conversely = false;
        }
        getData();
    });
    $(".td-process").click(function () {
        process = $(this).text();
        $('#selectedProcessName').text(process);
        getData();
    });
    $("#selectedProcessName").click(function () {
        process ='';
        $(this).text("None");
        getData();
    });
}
function checkAnswerFromServer() {
    setTimeout(function () {
        if (!clientObj['isAnswer'])
        {
            writeConsole('[ERROR] server is offline now !');
            ws.close();
            connectToServer();
        }
    }, 5000);
}

function sendRequest (request, type) {
    var targetId = $('#divId').text();
    var obj = {
        request:request,
        targetId: targetId
    };
    var objJSON = {
        ok: true,
        id: id,
        type:type,
        data:obj
    };

    var message = JSON.stringify(objJSON);
    setTimeout(function() {
        ws.send(message);
        clientObj['isAnswer'] = false;
        console.log('isAnswer ' + clientObj['isAnswer']);
    },250);
}

function connectToServer () {
    console.log('connect');
    ws = new WebSocket("ws://5.58.91.27:25565");
    clientObj['isAnswer'] = false;

    defineWsHandler();
    checkAnswerFromServer();
}

function sendAuthData () {
    var objOutput = {
        id:id,
        type:'auth'
    }

    var output = JSON.stringify(objOutput);
    clientObj['isAnswer'] = false;
    console.log('isAnswer ' + clientObj['isAnswer']);
    ws.send(output);
    console.log("output : "+ output);
}

function defineWsHandler () {
    ws.onmessage = function (message) {
        clientObj['isAnswer'] = true;
        console.log('isAnswer ' + clientObj['isAnswer']);
        writeConsole(message['data']);
    };
    ws.onclose = function () {
        if(clientObj['isAnswer'])
        {
            connectToServer();
        }
    };
    ws.onopen = function () {
        sendAuthData();
    };
}

function writeConsole (msg) {
    var now = new Date();
    //In order to show time with "0"
    var time=('0'  + now.getHours()).slice(-2)+':'+('0'  + now.getMinutes()).slice(-2)+':'+('0' + now.getSeconds()).slice(-2);
    var message = time + ' ' + msg;
    $('#answerBox').append('<div>' + message + '</div>');
    document.getElementById('answerBox').scrollTop = 9999;
}


function getData () {
    var id = $('#divId').text();
    var showWithoutText = $("#showWithoutText").prop("checked");
    $.ajax({
        type:"POST",
        url:"/userControl/ajax/",
        data:({id:id,orderBy:orderBy,showWithoutText:showWithoutText?1:0,conversely:conversely?1:0,process:process}),
        success:function(data){
          //  alert(data);
           $('#keyboardTable').html(data);
            defineFiltersHendler ();
        }
    });
}
