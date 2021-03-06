//Mostrar as notificações

// click on notification bell
$('.notification').click(function () {
    if (!$(document).find('.notification-dropdown').hasClass('dd')) {
        hide_dropdown()
    } else {
        $('.notification-dropdown').removeClass('dd').addClass('dropdown-transition')
    }
})

// handler to close dropdown on clicking outside of it
$(document).on('click', function (e) {
    var target = $(e.target)
    if (!target.closest('.notification').length && !target.closest('.dropdown-transition').length) {
        if (!$(document).find('.notification-dropdown').hasClass('dd')) {
            hide_dropdown()
        }

    }
    if (!target.closest('.ion-ios-navicon').length) {
        $(".sidebar").removeClass("active");
        $(".sidebar .sidebar-overlay").addClass("fadeOut animated").removeClass("fadeIn animated");
    }
    if (!target.closest('#resultado_pesquisa_publicacao').length) {
        document.getElementById('resultado_pesquisa_publicacao').innerHTML = '';
    }
})

$('.ion-ios-navicon').click(function () {
    $(".sidebar").addClass("active");
    $(".sidebar .sidebar-overlay").removeClass("fadeOut animated").addClass("fadeIn animated");
})

// function to close dropdown and setting notification count to 0
function hide_dropdown() {
    $(document).find('.notification-dropdown').removeClass('dropdown-transition').addClass('dd')
    $(document).find('.notification-dropdown').find('.list-item').addClass('background-white')
}
document.documentElement.onclick = function (event) {
    if (event.target === document.documentElement) {
        document.documentElement.classList.remove("menu-ativo");
    }
}
$('input.checkgroup').click(function () {
    if ($(this).is(":checked")) {
        $('input.checkgroup').attr('disabled', true);
        $(this).removeAttr('disabled');
    } else {
        $('input.checkgroup').removeAttr('disabled');
    }
})



$('#alterarSenha').click(function () {
    $('#modal-senha').addClass('modal-ativa');
})

$('#fechar-modal-senha').click(function () {
    $('#modal-senha').removeClass('modal-ativa');
})
$('#modalAvatar').click(function () {
    $('#modal-avatar').addClass('modal-ativa');
    $(".sidebar").removeClass("active");
    $(".sidebar .sidebar-overlay").addClass("fadeOut animated").removeClass("fadeIn animated");
})

$('#fechar-modal-avatar').click(function () {
    $('#modal-avatar').removeClass('modal-ativa');
})


$('#excluirConta').click(function () {
    $('#modal-conta').addClass('modal-ativa');
})

$('#fechar-modal-conta').click(function () {
    $('#modal-conta').removeClass('modal-ativa');
})

$('#cofirmaSenha').keyup(function () {
    var novaSenha = document.getElementById('novaSenha').value;
    var confirmaSenha = document.getElementById('cofirmaSenha').value;
    if (novaSenha == confirmaSenha) {
        alert("senhas iguais");

    } else {
        alert("senhas não são iguais");
    }
})
