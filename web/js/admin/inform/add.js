// 加载字典信息
$(document).ready(function(){
	generateDict('DICT_INFORM_TYPE','informType','通知类别');
	generateDict('DICT_IS_TOP','isTop','是否置顶');
})

//页面校验
$(function(){
	$.formValidator.initConfig({
		formid:"myform",
		autotip:true,			//是否显示提示信息
		onerror:function(msg,obj){
			window.top.art.dialog({content:msg,lock:true,width:'200',height:'50'}, function(){this.close();$(obj).focus();})
		}});
	// 校验模型名称	
	$("#informType").formValidator({
				onshow:"请选择通知类别！",
				onfocus:"请选择通知类别！"})
			.inputValidator({               //校验不能为空
				min:1,
				onerror:"请选择通知类别！"})
	$("#title").formValidator({
				onshow:"请输入通知标题！",
				onfocus:"请输入通知标题！"})
			.inputValidator({               //校验不能为空
				min:1,
				onerror:"请输入通知标题！"})
	$("#isTop").formValidator({
				onshow:"请选择是否置顶！",
				onfocus:"请选择是否置顶！"})
			.inputValidator({               //校验不能为空
				min:1,
				onerror:"请选择是否置顶！"})

})

//添加通知
function add(){
	if($.formValidator.pageIsValid()) { // 表单提交进行校验
		var paraStr = "";
		paraStr += "id=" + $("#id").val();
		paraStr += "&title=" + $("#title").val();
		paraStr += "&informType=" + $("#informType").val();
		paraStr += "&content=" + encodeURIComponent(contentEditor.getData());
		paraStr += "&senderDateTime=" + $("#senderDateTime").val();
		paraStr += "&attachUrls=" + $("#attachUrls").val();
		paraStr += "&attachNames=" + $("#attachNames").val();
		paraStr += "&isTop=" + $("#isTop").val();
		$.ajax({
			url: insertUrl,
			type: "post",
			dataType: "text",
			data: paraStr,
			async: "false",
			success: function (data) {
				if (data == "success") {
					window.top.art.dialog({
						content: '添加成功！',
						lock: true,
						width: 250,
						height: 80,
						border: false,
						time: 2
					}, function () {
					});
					art.dialog.parent.document.getElementById("iframeId").src = listallUrl;
					window.top.$.dialog.get('inform_add').close();
				} else {
					window.top.art.dialog({
						content: '添加失败！',
						lock: true,
						width: 250,
						height: 80,
						border: false,
						time: 2
					}, function () {
					});
				}

			},
			error: function (data) {
				window.top.art.dialog({
					content: '添加失败！',
					lock: true,
					width: 250,
					height: 80,
					border: false,
					time: 2
				}, function () {
				});
			}
		});
	}
}

//打开人员选择页面
function choose(id){
	window.location.href= chooseUrl+'&id='+id;
}