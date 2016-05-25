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
    comand_line();
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
    }

    $('#hide').click(function(){
       $('.savedText').each(function(i,elem) {
           if ($(elem).text() === "") {
               $(elem).parent().hide();
           }
       });
    });

    $('#show').click(function(){
        $('.savedText').each(function(i,elem) {
            if ($(elem).text() === "") {
                $(elem).parent().show();
            }
        });
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
    var comandHistory = ['bomba','kill'];
    var historyLength = 2;
    var pointer = -1;
    var lineSelector = $( "#comandLine" );

   lineSelector.keypress(function(event) {
        var key = event.key;
        switch (key){
            case 'Enter':
                var value = lineSelector.val();
                if(comandHistory[0] != value) {
                    historyLength = comandHistory.unshift(value);
                }
                writeConsole(value);
                lineSelector.val('');
                pointer = -1;
                break;
            case 'ArrowUp':
                pointer++;
                checkPoiner();
                lineSelector.val(comandHistory[pointer]);
                break;
            case 'ArrowDown':
                pointer--;
                checkPoiner();
                lineSelector.val(comandHistory[pointer]);
                break;
            default:
                break;
        }
    });

    function checkPoiner () {
        if(pointer < 0) {
            pointer = 0 ;
        }
        if((pointer + 1) > historyLength) {
            pointer = historyLength-1;
        }
    }
}