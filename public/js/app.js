$(document).ready(function(){
    $('.campo_cpf').mask("999.999.999-99");
    $('.alert-close').on('click', function(){
        $('#alert').fadeOut();
    });
});
// Global Functions
function showAlert(msg, type = 'primary'){
    $('#alert').removeClass('alert-danger');
    $('#alert').removeClass('alert-success');
    $('#alert').removeClass('alert-warning');
    $('#alert').removeClass('alert-primary');
    $('#alert').addClass('alert-' + type);
    $('#alert .message').html(msg);
    $('#alert').fadeIn();
}
function hideAlert(){
    $('#alert').fadeOut();
}

function getAlertType(alertTypeCode){
    if (alertTypeCode == 0){
        return 'danger';
    } else if(alertTypeCode == 1){
        return 'success';
    } else if (alertTypeCode == 2) {
        return 'primary';
    } else if (alertTypeCode == 3) {
        return 'warning';
    } else {
        return 'danger';
    }
}
