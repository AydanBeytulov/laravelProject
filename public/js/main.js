$(document).ready(function(){

    let roomOptionsCheck = $(".roomOptionsCheck") ;
    if(roomOptionsCheck.length > 0){
        roomOptionsCheck.change(function () {
            let value = $(this).is(":checked");
            let optionId = $(this).attr('data-id');

            $.post( "/api/roomOptions/"+optionId+"/"+value, function() {});
        });
    }

    let userCurrentLanguage = $("#userCurrentLanguage");
    if(userCurrentLanguage.length > 0){
       userCurrentLanguage.change(function(){
            let value = $(this).val();
            $.post( "/api/changeCurrentLanguage/"+value, function(response) {
                if(response.response === "Success"){
                    location.reload();
                }else{
                    console.log("Error with saving language #000003");
                }
            });
        });
    }

});