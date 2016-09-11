$(document).ready(function() {
    $('a.down').click(function() {
        var id = $(this).attr('id');
        if (confirm('确定吗？')) {
            $.ajax({
                url: '/admin/down/' + id,
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
