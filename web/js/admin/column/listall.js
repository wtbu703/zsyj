//打开修改页面
function openedit(columnId,title) {
	$.dialog({id:'column_update'}).close();
	var url = editUrl+'&columnId='+columnId;
	$.dialog.open(url,{
		title: '修改栏目'+'--'+title,
		width: 600,
		height:500,
		lock: true,
		border: false,
		id: 'column_update',
		drag:true
	});
}

//查看详情
function detail(columnId,title) {
	$.dialog({id:'column_detail'}).close();
	var url = detailUrl+'&columnId='+columnId;
	$.dialog.open(url,{
		title: '栏目详情'+'--'+title,
		width: 550,
		height:300,
		lock: true,
		border: false,
		id: 'column_detail',
		drag:true
	});
}

//多选删除
function delopt(){
	var len=$("input[name='columnId']:checked").size();
	var ids='';
	$("input[name='columnId']:checked").each(function(i, n){
		if(i<len-1){
			ids += $(n).val() + '-';
		}else{
			ids += $(n).val();
		}
	});
	if(ids=='') {
		window.top.art.dialog({content:'请选择至少一个栏目',lock:true,width:'200',height:'50',border: false,time:1.5},function(){});
		return false;
	}else{
		var paraStr = 'ids='+ids;
		$.ajax({
			url: delallUrl,
			type: "post",
			dataType: "text",
			data:paraStr ,
			async: "false",
			success: function (data) {
				window.top.art.dialog({
					content: '删除成功！',
					lock: true,
					width: 250,
					height: 80,
					border: false,
					time: 2
				}, function () {
				});
				$('#pageForm').submit();
			},
			error:function(data){
				window.top.art.dialog({
					content: '删除失败！',
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

// 单一删除
function deleteCol(columnId){
	var paraStr = 'columnId='+columnId;
	if (confirm('您确定要删除这个栏目吗？')) {
		$.ajax({
			url: delUrl,
			type: "post",
			dataType: "text",
			data:paraStr ,
			async: "false",
			success: function (data) {
				window.top.art.dialog({
					content: '删除成功！',
					lock: true,
					width: 250,
					height: 80,
					border: false,
					time: 2
				}, function () {
				});
				$('#pageForm').submit();
			},
			error:function(data){
				window.top.art.dialog({
					content: '删除失败！',
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

//多选保存排序
function saveall(){
	var len=$("input[name='columnId']:checked").size();
	var ids='';
	var ordersStr='';
	$("input[name='columnId']:checked").each(function(i, n){
		if(i<len-1){
			ids += $(n).val() + '-';
		}else{
			ids += $(n).val();
		}
	});
	if(len!=$("input[name='columnId']").size()) {
		window.top.art.dialog({content:'请全选后再保存',lock:true,width:'200',height:'50',border: false,time:1.5},function(){});
		return false;
	}else{
		$("input[name='ordeyBy']").each(function(i, n){
			if(i<len-1){
				ordersStr += $(n).val() + '-';
			}else{
				ordersStr += $(n).val();
			}
		});
		var paraStr = '';
		paraStr += 'ids='+ids;
		paraStr += "&orders="+ordersStr;
		$.ajax({
			url: saveallUrl,
			type: "post",
			dataType: "text",
			data:paraStr ,
			async: "false",
			success: function (data) {
				window.top.art.dialog({
					content: '保存成功！',
					lock: true,
					width: 250,
					height: 80,
					border: false,
					time: 2
				}, function () {
				});
				$('#pageForm').submit();
			},
			error:function(data){
				window.top.art.dialog({
					content: '保存失败！',
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