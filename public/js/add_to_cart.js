$(document).ready(function(){
    $('.overlay-content a').on('click',function(e){

        // let image=$($(this).children()[0]).attr('src')
        // let price=$($(this).children()[1]).html()
        // let title=$($(this).children()[2]).html()
        // let id=$($(this).children()[3]).attr('id')

        let item_id=$(this).attr('id')
        e.preventDefault()
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'/user/addToCart/',
            type: 'POST',
            data:{"item_id":item_id},
            success: function (response) {
                console.log(response);
                if(!response.mes){
                    window.location.reload();
                }
            }
        })
    })

})