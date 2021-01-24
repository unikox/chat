
$('#sendMessage').click(function () {
        //alert('xxxx')

        text_data = $('#messageArea').val();
        $('#messageArea').val(' ');
        
        //alert(text_data);
        sendMessage(text_data);
        
        setTimeout(() => { getMessageList(); }, 350);
        //getMessageList();
        
    }
)

function getMessageList(params) {
    
    $.ajax({
        url:'index.php?r=messages%2Fajaxmessages',
        type:'GET',
        dataType: 'html',
        success: function (res_msg_list) {
            
            decoded_res = JSON.parse(res_msg_list);
            //console.log(decoded_res);
            addMessages(decoded_res);
            
        }
    });
}
function addMessages(params) {

    $('.list-view').empty();
    params.forEach(
        element => $('.list-view').append('<div class="chat_message_item"><div class="chat_message_autor">Сообщение от:'+element.owner+'</div> <div class="chat_message_body">'+element.body+'</div></div>')
        );

    //$('.list-view').add(params);
}
function sendMessage(text_data) {
    var res;
    var obj;
    $.ajax({
        url: 'index.php?r=messages%2Fajaxdata',
        type: 'GET',
        data: ({ body:text_data}),
        dataType: 'html',
        success: function (res) {
            console.log(res);
 
        },
        error: function () {
            console.log('Error!');
        }
    });    
}
$( document ).ready(function() {

    setInterval(() => {
        //console.log( "ready!" )
        getMessageList();
    }, 500);    

    
        
        
    
    
    
});