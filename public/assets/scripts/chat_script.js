$(document).ready(function(){

    $('.chat_head').click(function(){
        $('.chat_body').slideToggle('slow');
    });
    $('.msg_head').click(function(){

        $('.msg_wrap').slideToggle('slow');
    });

    $('.close').click(function(){
        $('.msg_box').hide();
    });

    $('.user').click(function(){
        $('.msg_wrap').show();
        $('.msg_box').show();
    });

    $('#mainText').keypress(
        function(e){
            if (e.keyCode == 13) {
                e.preventDefault();
                var msg = $(this).val();
                $(this).val('');
                if(msg!='')
                    $('<div class="msg_b">'+msg+'</div>').insertBefore('.msg_push');
                $('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);
            }
        });

});
function selectedUser(user_id, name){
    var user_id = user_id;
    var name = name;
    alert(name);
    $(document).ready(function(){
        $(".user").click(function(){
            $(".msg_head").load(name);
        });
    });
}
function getText(sender_id){
    var sender_id = sender_id;
    var msg = document.getElementById("mainText").value;

        $.ajax({
            url:"getvalue.php",
            success:function(data) {
                handleData(data);
            }
        });

    alert(msg);
}
function getText(sender_id) {

    $(document).ready(function () {
        $('#submit').on('submit', function (e) {
            e.preventDefault();
            var sender_id = sender_id;
            var receiver_id = 2;
            var msg = document.getElementById("mainText").value;
            $.ajax({
                type: "POST",
                url: host + '/articles/create',
                data: {sender_id: sender_id, msg: msg, receiver_id:receiver_id },
                success: function (msg) {
                    $("#msg_body").append("<div>" + msg + "</div>");
                }
            });
        });
    });
}