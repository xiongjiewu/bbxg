$(document).ready(function() {
    $('a.action').click(function() {
        var id = $(this).attr('id');
        var action = $(this).attr('action');
        if (confirm('确定吗？')) {
            $.ajax({
                url: '/admin/order/' + id + '/' + action,
                type: 'put',
                dataType: 'json',
                success: function(data) {
                    alert(data.msg);
                    if (data.status == 'ok') {
                        window.location.reload();
                    }
                }
            });
        }
    });
});
