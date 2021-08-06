$(document).ready(function (){
    $('.delete-user').click(function (){
        let idUser = $(this).attr('data-id')
        let origin = location.origin
        $.ajax({
            url: origin + '/user/' + idUser + '/delete/',
            method: 'GET',
            type: 'json',
            success: function (res) {
                $('#user-' + idUser).remove()
            }
        })
    })
})
