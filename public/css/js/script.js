$('#submit_form').on('submit',function(e){
	e.preventDefault();
	var name = $("input[name='name']").val();
	var longitude = $("input[name='longitude']").val();
	var latitude = $("input[name='latitude']").val();
	var count_people = $("input[name='count_people']").val();
	$.ajaxSetup({
      headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	
	$.ajax({
		url: '/AjaxSubmit',
		data: {name: name, longitude:longitude, latitude:latitude, count_people:count_people},
		type: 'post',
		success: function(data){
			console.log(data);
			/*data = $.parseJSON(data);*/
			/*data = JSON.parse(data);*/
			$('#country').empty();
			$('#message').empty();
			$('#message').append('<div class="alert alert-success">Данные успешно добавлены!</div>');
			data.forEach(function(entry) {
				$('#country').append('<tr> <th scope="row">'+entry.id+'</th> <td>'+entry.name+'</td> <td>'+entry.longitude+'</td>  <td>'+entry.latitude+'</td> <td>'+entry.count_people+'</td></tr>');
			});
		   
		},
		error:function(data){
			console.log(data);
			$('#message').empty();
			$('#message').append('<div class="alert alert-danger">Ошибка при добавление данных!</div>');
			
		}
	});
	
	return false;
});

	