var ws;
var id = '8f51dfd14221bc7d6adaefdf0533bf9e2af2d21e1395c6085fdf76943734c271';
var clientObj = {
    isAnswer:false
}
$(document).ready(function(){
    main();
});
//main();
function main (){
    //comand_line();
    if (!window.WebSocket) {
        alert ('WebSocket is  unsupported in your browser!');
    }
    connectToServer();
    $('.getButton').click(function(){
        if(clientObj['isAnswer']) {
            var request = $(this).attr('title');
            sendRequest(request, 'request');
            checkAnswerFromServer();
        }
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

function comand_line (){
    setInterval(function() {
        $('#consoleChar').hide();
        setTimeout(function() {
            $('#consoleChar').show();
        }, 500);
    }, 1000);
}