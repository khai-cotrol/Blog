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

    $('.delete-product').click(function (){
        // alert(1223)
        let idProduct = $(this).attr('data-id')
        let origin = location.origin
        $.ajax({
            url: origin + '/low-budget/' + idProduct + '/delete' ,
            method: 'GET',
            type: 'json',
            success: function (res) {
                $('#product-' + idProduct).remove()
            },
            error: function () {
                alert("You can't delete this product!!!")
            }
        })
    })

    $('.delete-comment').click(function (){
        let idComment = $(this).attr('data-id')
        let origin = location.origin
        $.ajax({
            url: origin + '/delete/' + idComment,
            method: 'GET',
            type: 'json',
            success: function (res) {
                $('#comment-' + idComment).remove()
            }
        })
    })

    $('.delete-post').click(function (){
        let idPost = $(this).attr('data-id')
        let origin = location.origin
        $.ajax({
            url: origin + '/postDelete/' + idPost,
            method: 'GET',
            type: 'json',
            success: function (res){
                $('#post-' + idPost).remove()
            }
        })
    })

    $('#icon-eye').click(function (){
        let type = $('#password').attr('type')
        newType = (type === 'password') ? 'text' : 'password'
        $('#password').attr('type', newType)

        let classIcon = (type === 'password') ? 'fas fa-eye' : 'fas fa-eye-slash'
        $('#icon-slash').removeClass()
        $('#icon-slash').addClass(classIcon)
    })
})
