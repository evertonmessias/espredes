$(function () {
    var exp = /^\w+([\.-]\w+)*@\w+\.(\w+\.)*\w{2,3}$/;// ER valida mail    

    $("#botao1").click(function () {
        if ($("#nome").val().length < 3) {
            $("#nome").css("color", "red").val("Digite o Nome Corretamente!");
            $("#nome").click(function () { $(this).focus().val('').css("color", "black"); });
            return false;
        }
        else if (!exp.test($("#mail").val())) {
            $("#mail").css("color", "red").val("Digite o E-Mail Corretamente!");
            $("#mail").click(function () { $(this).focus().val('').css("color", "black"); });
            return false;
        }
        else if ($("#msg").val().length < 3) {
            $("#msg").css("color", "red").val("Digite a Mensagem Corretamente!");
            $("#msg").click(function () { $(this).focus().val('').css("color", "black"); });
            return false;
        }
        else {
            var nome = $("#nome").val(); 
            var mail = $("#mail").val(); 
            var msg = $("#msg").val();
            $.post("assets/js/enviar.php", { nome: nome, mail: mail, msg: msg }, function (mostrar) {
                $('#mensagemOK').fadeIn(500).html(mostrar);});
            $("#nome").val("OK");$("#mail").val("OK");$("#msg").val("OK");
        }
    });
    $("#mensagemOK").click(function () {
        $(this).fadeOut(200);
    });
});