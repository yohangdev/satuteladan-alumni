$(document).ready(function () {
    $("#submitButton").click(function(){
        if(checkForm()){
            $("form").submit(); 
        }
    });
});

function checkForm(){
    $(".alert-title").hide();
    $(".alert-description").hide();
    if($("input:text[name=title]").val().length < 5){
        $(".alert-title").show();
        return false;
    }
    if($("textarea#description").val().length < 20){
        $(".alert-description").show();
        return false;
    }
    return true;
};
