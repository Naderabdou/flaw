require('./bootstrap');


import Echo from "laravel-echo"

window.io = require('socket.io-client');

window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001'
});

let onLineUserslength=0;

window.Echo.join('chat')
    .here((users) => {


        onLineUserslength=users.length;
        if (users.length>1){
            $('#no-online-users').css('display','none');
        }


        let userid=$('meta[name=user_id]').attr('content');

        users.forEach(function (user){


            if (user.id==userid){
                return;
            }


            $('#online-users').append(`<li class="media" id="user-${user.id}">
                                     <a href="#" class="media-link">
                                        <div class="media-body" >
                                            <span class="media-heading text-semibold">${user.name}</span>
                                        </div>
                                        <div class="media-right media-middle">
                                            <span class="status-mark bg-success"></span>
                                        </div>
                                    </a>
                                </li>`);
        })
        console.log(users);

    })


    .joining((user) => {
        onLineUserslength++
        console.log(user.name);
        $('#no-online-users').css('display','none');
        $('#online-users').append(`<li class="media" id="user-${user.id}">
                                     <a href="#" class="media-link">
                                        <div class="media-body" >
                                            <span class="media-heading text-semibold">${user.name}</span>
                                        </div>
                                        <div class="media-right media-middle">
                                            <span class="status-mark bg-success"></span>
                                        </div>
                                    </a>
                                </li>`);



    })


    .leaving((user) => {

        onLineUserslength--
        if (onLineUserslength==1){
            $('#no-online-users').css('display','block');

        }

        console.log(user.name);
        $('#user-'+ user.id).remove();
    });

/**$('#chat-text').keypress(function(e) {

    if (e.which == 13){

        e.preventDefault();
        let url=$(this).data('url');
        let body=$('#chat-text').val();

        let data={
            '_token': $('meta[name=csrf-token]').attr('content'),
            body:body
        }
        console.log(url);
        $.ajax({
            url:'/message/store-message',
            data:data,
            method:'POST'
        })


    }


});*/


let time=$('meta[name=time]').attr('content')

$(document).on("keypress.key102", function(event) {
    if ($('#chat-text').is(':visible')) {
        if (event.which == 13 ) {
            event.preventDefault();
            let body = $('#chat-text').val();

            console.log(body);
            $('#send-chat').append(`
                <li class="media" >
                                    <div class="media-body container">
                                        <div class="media-content bg-slate">${body}</div>
                                        <span class="media-annotation display-block mt-10">${new Date(time).getHours()} :  ${new Date(time).getUTCMinutes()}<a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
                                    </div>

                                </li>
                `);
                let data = {
                '_token': $('meta[name=csrf-token]').attr('content'),
                body:body
            };
            $.ajax({
                url:'/message/store-message',
                method:'POST',
                data:data ,
            });
            $('#chat-text').val('');            }        }
    else {
        if (event.which == 13) {
            return;
        }
    }
});

window.Echo.channel('laravel_database_send-messages')
    .listen('sendEvent', (e) => {
        console.log(e.message)
        $('#send-chat').append(`
                <li class="media reversed" id="media-reversed">
                                    <div class="media-body container">
                                        <div class="media-content bg-info">${e.message.body}</div>
                                        <span class="media-annotation display-block mt-10">${new Date(e.message.created_at).getHours()} :  ${new Date(e.message.created_at).getUTCMinutes()}<a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
                                    </div>

                                </li>
                `);

    });







let userid=$('meta[name=user_id]').attr('content');
             /// Event Imbalances Statues////
/*window.Echo.channel('laravel_database_chat-notification.'+userid)
    .listen('RealTimeMessage', (e) => {
        console.log(e);
        $('#list-notify').append(`<li class="media">


                            <div class="media-body">
                                <a href="/data/${e.message.id}" class="media-heading">
                                    <span class="text-semibold"> Admin : ${e.admin}</span>
                                    <br>
                                    <span class="text-semibold"> Name Imbalance : ${e.message.bug_name}</span>
                                    <span class="media-annotation pull-right">Time: ${new Date(e.message.created_at).getHours()} :  ${new Date(e.message.created_at).getUTCMinutes()}</span>
                                </a>

                                <span class="text-muted"> Status: ${e.message.status}</span>
                            </div>

                        </li>`)
       document.getElementById('notifications_count').innerHTML=e.count;
    })*/











              /// Event Add Imbalances /////
/*window.Echo.channel('laravel_database_Add-imbalance.'+userid)
    .listen('AddImbalances', (e) => {
        console.log(e.imbalances.user_id)
        ;
        console.log('laravel_database_Add-imbalance.'+userid);
        $('#list-notify').append(`<li class="media">


                            <div class="media-body">
                                <a href="/all/${e.imbalances.user_id}" class="media-heading">
                                    <span class="text-semibold"> user : ${e.user}</span>
                                    <br>
                                    <span class="text-semibold"> Name Imbalance : ${e.imbalances.bug_name}</span>
                                    <span class="media-annotation pull-right">Time: ${new Date(e.imbalances.created_at).getHours()} :  ${new Date(e.imbalances.created_at).getUTCMinutes()}</span>
                                </a>

                                <span class="text-muted"> Status: ${e.imbalances.status}</span>
                            </div>

                        </li>`)
        document.getElementById('notifications_count').innerHTML=e.count;


    })
*/




                   /// Broadcast Add Imbalances ///

                         //Broadcast Imbalances Statues//
window.Echo.channel('laravel_database_private-App.Models.User.' + userid)
    .notification((e) => {
        if (e.type=='App\\Notifications\\ImbalancesNotify'){
            console.log(e);
            $('#list-notify').append(`<li class="media">


                            <div class="media-body">
                                <a href="/data/${e.imbalances_id}" class="media-heading">
                                    <span class="text-semibold"> Admin : ${e.admin}</span>
                                    <br>
                                    <span class="text-semibold"> Name Imbalance : ${e.name_imbalance}</span>
                                    <span class="media-annotation pull-right">Time: ${new Date(time).getHours()} :  ${new Date(time).getUTCMinutes()}</span>
                                </a>

                                <span class="text-muted"> Status: ${e.status}</span>
                            </div>

                        </li>`)
            document.getElementById('notifications_count').innerHTML=e.count;

        }else if (e.type=='App\\Notifications\\AddImbalances'){
            console.log(e);
            $('#list-notify').append(`<li class="media">


                            <div class="media-body">
                                <a href="/all/${e.user_id}" class="media-heading">
                                    <span class="text-semibold"> user : ${e.user}</span>
                                    <br>
                                    <span class="text-semibold"> Name Imbalance : ${e.name_bug}</span>
                                    <span class="media-annotation pull-right">Time: ${new Date(time).getHours()} :  ${new Date(time).getUTCMinutes()}</span>
                                </a>

                                <span class="text-muted"> Status: ${e.statues}</span>
                            </div>

                        </li>`)
            document.getElementById('notifications_count').innerHTML=e.count;

        }

    });








/**
 * let onLineUserslength=0;

window.Echo.join('chat')
    .here((users) => {


        onLineUserslength=users.length;
        if (users.length>1){
            $('#no-online-users').css('display','none');
        }


        let userid=$('meta[name=user_id]').attr('content');

        users.forEach(function (user){


            if (user.id==userid){
                return;
            }


            $('#online-users').append(`<li id="user-${user.id}" class="list-group-item"><i class="fas fa-circle text-success"></i>&nbsp;${user.name}</li>`);
        })
        console.log(users);

    })


    .joining((user) => {
        onLineUserslength++
        console.log(user.name);
        $('#no-online-users').css('display','none');
        $('#online-users').append(`<li id="user-${user.id}" class="list-group-item"><i class="fas fa-circle text-success"></i>&nbsp;${user.name}</li>`);



    })


    .leaving((user) => {

        onLineUserslength--
        if (onLineUserslength==1){
            $('#no-online-users').css('display','block');

        }

        console.log(user.name);
        $('#user-'+ user.id).remove();
    });

$('#chat-text').keypress(function(e) {

    if (e.which == 13){

        e.preventDefault();
        let url=$(this).data('url');
        let body=$(this).val();
        let data={
            '_token': $('meta[name=csrf-token]').attr('content'),
            body:body
        }
        $.ajax({
            url:url,
            data:data,
            method:'POST'
        })


    }


});

*/

