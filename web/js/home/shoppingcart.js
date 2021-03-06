/**
 * Created by MacheNike on 2016/4/9.
 */
function GetCount() {//已选商品数量
    var aa = 0,counts=0;
    $(".check-one-check" ).each(
        function (index,element) {
            if ($(this).attr("checked")) {
                aa++;
                counts += parseFloat($(".subtotal").eq(index).text());//总价格计算
                return;
            }
        }
    );
    $("#selectedTotal").text(aa);
    $("#priceTotal").text(counts.toFixed(2));
}
$(function(){
    //点击复选框
    $(".check-all-check").click(function(){//全选全不选
        if($(this).attr("checked")=="checked"){
            $(".check-one-check").attr("checked","true");
            $(".check-all-check").attr("checked","true");

        }else{
            $(".check-one-check").removeAttr("checked");
            $(".check-all-check").removeAttr("checked");

        }
        GetCount();
    })
    $(".check-one-check").click(function(){
        if($("input[type='checkbox'].check-one-check").length>$("input[type='checkbox'].check-one-check:checked").length)
        {
            $(".check-all-check").removeAttr("checked");//不是全选，全选框去掉
        }

        else{
            $(".check-all-check").attr("checked","true");
        }
        GetCount();
    })

    //数量加减
    var index;
    $(".add").click(function(){//加
        index = $(".add").index(this);
        $(".count-input").eq(index).val(parseInt($(".count-input").eq(index).val()) + 1);
        var totalPrice = parseInt($(".count-input").eq(index).val())*parseFloat($(".price").eq(index).text())*parseFloat($(".discount").eq(index).text());//小计计算价格
        $(".subtotal").eq(index).text(totalPrice.toFixed(2));

        GetCount();
    })
    $(".reduce").click(function(){ //减
        index = $(".reduce").index(this);
        if($(".count-input").eq(index).val()<=1){
            $(".count-input").eq(index).val(2);
        }
        $(".count-input").eq(index).val(parseInt($(".count-input").eq(index).val()) - 1);
        var totalPrice = parseInt($(".count-input").eq(index).val())*parseFloat($(".price").eq(index).text())*parseFloat($(".discount").eq(index).text());//小计计算价格
        $(".subtotal").eq(index).text(totalPrice.toFixed(2));
        GetCount();
    })

    //删除行
    $(".delete").click(function(){
        $(this).parent().remove();
    })

    //删除勾选的
    $("#deleteAll").click(function(){
        var confs = confirm('确定删除勾选商品吗？');
        var len=$("input[name='check']:checked").size();
        var ids='';
        $("input[name='check']:checked").each(function(i, n){
            if(i<len-1){
                ids += $(n).val() + '-';
            }else{
                ids += $(n).val();
            }
        });
        var paraStr = '';
        paraStr = 'ids='+ids+'&len='+len;
        $.ajax({
            url: delallUrl,
            type: "post",
            dataType: "text",
            data:paraStr ,
            async: false,
            success: function (text){
                if(text == ''){
                    $("#full").show();
                }else{
                    $(".cart_num").html(text);
                }
            },
            error: function(text){
                alert(text);
            }
        });
        $('table tr:gt(0)').hide();
        $('#selectedTotal').text('0');
        $('#priceTotal').text('￥0.00');
    });
    GetCount();
})

function purchase() {
    var len=$(".check-one-check:checked").size();
    var ids='';
    var counts = '';
    $(".check-one-check:checked").each(function(i, n){
        var product = $(n).val();
        if(i<len-1){
            ids += product + '-';
            counts += $("#"+product).val() + '-';
        }else{
            ids += product;
            counts += $("#"+product).val();
        }
    });
    window.location.href = purchaseUrl+'&ids='+ids+'&counts='+counts;

}

function delshopcart(id) {
    var proStr = "";
    proStr = 'id='+id;
    $.ajax({
        url: delUrl,
        type: "post",
        dataType: "text",
        data: proStr,
        async: false,
        success: function (text){
            if(text == ''){
                $("#full").show();
            }else{
                $(".cart_num").html(text);
            }
        },
        error: function(text){
            alert(text);
        }
    });
}