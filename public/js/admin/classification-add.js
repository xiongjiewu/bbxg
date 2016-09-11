$(document).ready(function() {
    $('button[type="submit"]').click(function() {
        var classification_id = $('#classification_id').val();
        var name = $.trim($('#name').val());
        if (!name) {
            alert('请输入名称');
            return false;
        }
        $.ajax({
            url: '/admin/classification/add?' + Math.ceil(Math.random() * 1000000),
            type: 'post',
            data: {classification_id:classification_id,name:name},
            dataType: 'json',
            success: function(data) {
                alert(data.msg);
                if (data.status == 'ok') {
                    window.location.reload();
                }
            }
        });
    });
});
