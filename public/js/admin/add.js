$(document).ready(function() {
    $('button[type="submit"]').click(function() {
        var good_id = $('#good_id').val();
        var name = $.trim($('#name').val());
        if (!name) {
            alert('请输入名称');
            return false;
        }
        var desc = editor.getSource();
        if (!desc) {
            alert('请输入商品描述');
            return false;
        }
        var classification_id = $('#classification_id').val();
        if (!classification_id || classification_id == 0) {
            alert('请选择分类');
            return false;
        }
        var surface = $('#surface').val();
        if (!surface) {
            alert('封面图不是有效地址');
            return false;
        }
        var production = $('#production').val();
        if (!production || production == '') {
            alert('请填写产品');
            return false;
        }
        var size = $('#size').val();
        if (!size || size == '') {
            alert('请输入型号');
            return false;
        }
        $.ajax({
            url: '/admin/good/add?' + Math.ceil(Math.random() * 1000000),
            type: 'post',
            data: {name:name,desc:desc,classification_id:classification_id,surface:surface,production:production,size:size,good_id:good_id},
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
