function save(){
        var paraStr = "";
        paraStr +="id="+$("#id").val();
        paraStr +="&mobilephone="+$("#mobilephone").val();
        paraStr +="&email="+$("#email").val();
        paraStr +="&sex="+$("input[name='sex']:checked").val();
        paraStr +="&postcode="+$("#postcode").val();
        $.ajax({
            url: updateUrl,
            type: "post",
            dataType: "text",
            data:paraStr ,
            async: "false",
            success: function (data) {
                alertTip('修改成功！',true);
                window.parent.location.href= personaldataUrl;
            },
            error:function(data){
                alertTip('修改失败！',true);
            }
        });

    }
//表单验证
$(function(){
    $('form :input').blur(function() {
        var $parent = $(this).parent();
        $parent.find('.formtips').remove();
        //验证手机号
        if ($(this).is('#mobilephone')) {
            if (this.value == '' || (this.value !=''&&!/^1\d{10}$/i.test(this.value))) {
                var errormsg = '输入号码不正确';
                $parent.append("<span id='fortips_error' class='formtips error'>" + errormsg + '</span>');
            } else {
                var okmsg = '输入正确';
                $parent.append("<span id='fortips_ok' class='formtips ok'>" + okmsg + "</span>");
            }
        }
        //验证邮箱
        if($(this).is('#email')) {
            if (this.value == '' || (this.value !=''&&!/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/.test(this.value))) {
                var errormsg = '输入邮箱不正确';
                $parent.append("<span id='fortips_error' class='formtips error'>" + errormsg + '</span>');
            } else {
                var okmsg = '输入正确';
                $parent.append("<span id='fortips_ok' class='formtips ok'>" + okmsg + "</span>");
            }
        }
        //验证邮政编码
        if($(this).is('#postcode')) {
            if (this.value == '' || (this.value !=''&&!/[1-9]\d{5}(?!\d)/.test(this.value))) {
                var errormsg = '输入邮编不正确';
                $parent.append("<span id='fortips_error' class='formtips error'>" + errormsg + '</span>');
            } else {
                var okmsg = '输入正确';
                $parent.append("<span id='fortips_ok' class='formtips ok'>" + okmsg + "</span>");
            }
        }
    })

})