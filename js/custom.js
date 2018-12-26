var key=0;
function getProDuct(id)
	{
		$.get('getproductcat.php?id='+id,function(result){
			$('#listProByCat').html(result);
		});
		key=id;
	}

function orderPro(order)
{
	// alert(key);
	// alert($('.test').attr('value'));
	$.get('orderProduct.php?order='+order+'&id='+key,function(result){
				$('#listProByCat').html(result);
	});
}

function findCash(cash)
{
	$.get('cashProduct.php?tien='+cash+'&id='+key,function(result){
		$('#listProByCat').html(result);
	});
}

function search()
{
	$value = $('#search-product').val();
	$.get('searchproduct.php?search='+$value,function(result){
		$('#listProByCat').html(result);
	});
}

function loadmore()
{
	// var id_get = document.getElementById('btn_more').dataset.proid;
	// alert(id_get);
	var id_get = $('#btn_more').attr('value');
	document.getElementById('btn_more').innerHTML = 'Loading...';

	// $.post('load_data.php?last_id='+id_get,function(data){
	// 	if(data!='')
	// 	{
	// 		$('#remove_button').remove();
	// 		$('#listProByCat').append(data);
	// 	}else{
	// 		$('#btn_more').html('No Data');
	// 	}
	// });
	$.ajax({
		method: "get",
		url: "loaddata.php",
		data: {"lastid":id_get,"catid":key},
		dataType: 'html',
		success: function(result)
		{
			if(result!='')
			{
				$('#remove_button').remove();
				$('#listProByCat').append(result);
			}else{
				$('#btn_more').html('No Data');
			}
		}
	});
}