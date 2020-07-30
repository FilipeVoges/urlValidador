$(document).ready(function () {
    $('#seeBody').click(function (e) {
        e.preventDefault();

        let url = $(this).attr('href')
        $.ajax({
            url: url,
            aSync: false,
            dataType: "html",
            success: function(data) {
                $('#bodyPage').html(data);
                $('#modalBodyPage').modal();
            },
        });
    });
});
