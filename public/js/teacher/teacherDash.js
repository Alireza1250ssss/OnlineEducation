$(document).ready(function(){
    $('aside ul li.title').click(function(){
        $(this).next().toggleClass('d-none');
    })

    $('#markasreadbtn').click(function(){
        var notifCnt = $(this).closest('.notif-cnt');
        var notifs = notifCnt.find('input[type=checkbox]:checked');
        var inputs =[];
        $.each(notifs,function(index , element){
            inputs.push($(element).val());
        })
        inputs = "notifs="+JSON.stringify(inputs);
        $.ajax({
            url : "notifications/markAsRead",
            type : "GET",
            data : inputs
        });
        location.reload();
    })

    $('#deletenotifbtn').click(function(){
        var notifCnt = $(this).closest('.notif-cnt');
        var notifs = notifCnt.find('input[type=checkbox]:checked');
        var inputs =[];
        $.each(notifs,function(index , element){
            inputs.push($(element).val());
        })
        inputs = "notifs="+JSON.stringify(inputs);
        $.ajax({
            url : "notifications/delete",
            type : "GET",
            data : inputs
        });
        location.reload();
    })
});

function show(id){
    var parts=document.querySelectorAll('.box > div.part');
    parts.forEach(element => {
        element.classList.add('d-none');
    });
    document.getElementById(id).classList.remove('d-none');
}