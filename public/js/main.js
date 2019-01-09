$(document).ready(function(){

    let roomOptionsCheck = $(".roomOptionsCheck") ;
    if(roomOptionsCheck.length > 0){
        roomOptionsCheck.change(function () {
            let value = $(this).is(":checked");
            let optionId = $(this).attr('data-id');

            $.post( "/api/roomOptions/"+optionId+"/"+value, { api_token: "mwns7bequ6nn3KQitPu8O7AtqSIAGqwRtzuds9aMFpQ9iYsa2DWAZ5NDKnsd" }).done(function( data ) {});
        });
    }

    let userCurrentLanguage = $("#userCurrentLanguage");
    if(userCurrentLanguage.length > 0){
       userCurrentLanguage.change(function(){
            let value = $(this).val();
           $.post( "/api/changeCurrentLanguage/"+value, { api_token: "mwns7bequ6nn3KQitPu8O7AtqSIAGqwRtzuds9aMFpQ9iYsa2DWAZ5NDKnsd" }).done(function( response ) {
               if(response.response === "Success"){
                   location.reload();
               }else{
                   console.log("Error with saving language #000003");
               }
           });
        });
    }

});