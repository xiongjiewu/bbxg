$(document).ready(function() {
    $('input[type="submit"]').click(function() {
        var production = $('input[name="production"]:checked').val();
        if (production == undefined || !production) {
            alert('请选择产品');
            return false;
        }
        var size = $('input[name="size"]:checked').val();
        if (size == undefined || !size) {
            alert('请选择型号');
            return false;
        }
        var user_name = $.trim($('input[name="user_name"]').val());
        if (!user_name || user_name == undefined) {
            alert('请输入顾客姓名');
            return false;
        }
        var phone = $.trim($('input[name="phone"]').val());
        if (!phone|| phone == undefined) {
            alert('请输入手机号码');
            return false;
        }
        if (phone.length != 11) {
            alert('请输入11位手机号码');
            return false;
        }
        var address = $.trim($('textarea[name="address"]').val());
        if (!address|| address == undefined) {
            alert('请输入收货地址');
            return false;
        }
        var feedback= $.trim($('textarea[name="feedback"]').val());
        $.ajax({
            url: '',
            type: 'post',
            data: $('#buy').serialize(),
            dataType: 'json',
            success: function(data) {
                alert(data.msg);
            }
        });
    });
});
