$("#contactForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        //lidar com o formulário inválido...
        formError();
        submitMSG(false, "Você preencheu o formulário corretamente?");
    } else {
        // tudo parece bem!
        event.preventDefault();
        submitForm();
    }
});


function submitForm(){
    // Iniciando variaveis
    var name = $("#name").val();
    var email = $("#email").val();
    var guest = $("#guest").val();
    var event = $("#event").val();
    var message = $("#message").val();

console.log(name);
console.log(email);
console.log(guest);
console.log(event);
console.log(message);


    $.ajax({
        type: "POST",
        url: "sendgrid.php",
        data: "name=" + name + "&email=" + email + "&guest=" + guest + "&event=" + event +  "&message=" + message,
        success : function(text){
            if (text == "success"){
                formSuccess();
            } else {
                formError();
                submitMSG(false,text);
            }
        }
    });
}

function formSuccess(){
    $("#contactForm")[0].reset();
    submitMSG(true, "Mensagem Enviada!")
}

function formError(){
    $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        $(this).removeClass();
    });
}

function submitMSG(valid, msg){
    if(valid){
        var msgClasses = "h3 text-center tada animated text-success";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}