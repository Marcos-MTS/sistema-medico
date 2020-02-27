
$(document).ready(function () {

    var erros = '';

    function maxMin(string, campo, max, min) {
        if (string.trim().length > max) {
            erros += 'O campo ' + campo + ' deve conter no máximo ' + max + ' caracteres! </br></br>';
        }
        if (string.trim().length < min) {
            erros += 'O campo ' + campo + ' deve conter no mínimo ' + min + ' caracteres! </br></br>';
        }
    }
    function testPass(pass1, pass2) {
        if (pass1 !== pass2) {
            erros += 'As senhas não são iguais! </br></br>';
        }
    }

    function isEmail(string) {
        var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (!string.match(emailformat)) {
            erros += 'Email Inválido! </br></br>';
        }
    }

    $("#form-cadastro").submit(function () {
        erros = '';
        maxMin($('#nomeTxt').val(), 'Nome', 112, 6);
        maxMin($('#emailTxt').val(), 'Email', 112, 6);
        isEmail($('#emailTxt').val());
        maxMin($('#enderecoConsultorioTxt').val(), 'Endereço do Consultório', 112, 6);
        maxMin($('#senhaTxt').val(), 'Senha', 112, 6);
        testPass($('#senhaTxt').val(), $('#reSenhaTxt').val());

        if (erros) {
            $.MessageBox('<b>Atenção</b></br></br>' + erros);
            return false;
        }
    });

    $("#form-edicao-cadastro").submit(function () {
        erros = '';
        maxMin($('#nomeTxt').val(), 'Nome', 112, 6);
        maxMin($('#enderecoConsultorioTxt').val(), 'Endereço do Consultório', 112, 6);

        if ($('#senhaTxt').val().trim().length > 0 || $('#reSenhaTxt').val().trim().length > 0) {
            maxMin($('#senhaTxt').val(), 'Senha', 112, 6);
            testPass($('#senhaTxt').val(), $('#reSenhaTxt').val());
        }

        if (erros) {
            $.MessageBox('<b>Atenção</b></br></br>' + erros);
            return false;
        }
    });

    $('.btn-delete').click(function ()
    {
        var href = $(this).attr("href");
        $.MessageBox({
            buttonDone: "Sim",
            buttonFail: "Não",
            message: "Você deseja realmente excluir esse médico?"
        }).done(function () {
            location.href = href;
        }).fail(function () {
            $.MessageBox('<b>Operação cancelada!</br>');
        });
        return false;
    });
});

