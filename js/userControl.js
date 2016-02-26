var ws;
var id = '8f51dfd14221bc7d6adaefdf0533bf9e2af2d21e1395c6085fdf76943734c271';
var clientObj = {
    isAnswer:false
}

main();
function main (){
    //comand_line();
    if (!window.WebSocket) {
        alert ('WebSocket is  unsupported in your browser!');
    }
    connect_to_server();
    $('.getButton').click(function(){
        if(clientObj['isAnswer']) {
            var request = $(this).attr('title');
            send_request(request, 'request');
            check_answer_from_server();
        }
    });
}
function check_answer_from_server() {
    setTimeout(function () {
        if (!clientObj['isAnswer'])
        {
            write_console('[ERROR] server is offline now !');
            ws.close();
            connect_to_server();
        }
    }, 5000);
}
function send_request (request,type) {
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
function connect_to_server () {
    console.log('connect');
    ws = new WebSocket("ws://5.58.91.27:25565");

    define_ws_handler();
    var objOutput = {
        id:id,
        type:'auth'
    }

    var output = JSON.stringify(objOutput);
    setTimeout(function() {
        clientObj['isAnswer'] = false;
        console.log('isAnswer ' + clientObj['isAnswer']);
        ws.send(output);
        console.log("output : "+ output);
    }, 250);
    check_answer_from_server();
}
//$(document).ready(function(){main ();});
function define_ws_handler () {
    ws.onmessage = function (message) {
        clientObj['isAnswer'] = true;
        console.log('isAnswer ' + clientObj['isAnswer']);
        write_console(message['data']);
    };
    ws.onclose = function () {

    }
}
function write_console (msg) {
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