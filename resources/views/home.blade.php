@include('header');
<body>
	<div class="container">
		<form action="{{ route('ajaxSubmit') }}"   id="submit_form" method="POST">
			@csrf
			<meta name="csrf-token" content="{{ csrf_token() }}">
			 <div class="form-group">
				<label for="exampleInputName">Название</label>
				<input name="name" type="text" class="form-control" aria-describedby="exampleInputName" placeholder="Название" required>
			</div>
			<div class="form-group">
				<label for="emailForm">Долгота</label>
				<input id="emailForm" name="longitude" type="text" class="form-control" placeholder="Долгота" required>
			</div>
			<div class="form-group">
				<label for="exampleFormControlTextarea">Широта</label>
				<input name="latitude" class="form-control" type="text" id="exampleFormControlTextarea" placeholder="Широта" required>
			</div>
			<div class="form-group">
				<label for="exampleFormControlTextarea1">Количество населения</label>
				<input name="count_people" class="form-control" id="exampleFormControlTextarea1" placeholder="Количество населения" required>
			</div>
			<button type="submit" class="btn btn-primary">Отправить</button>
		</form>
	</div>
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			@if($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</u>
			</div>
			@endif
			@if(session('success'))
			<div class="alert alert-success">
				{{session('success')}}
			</div>
			@endif
			<h1 class="display-4">Home</h1>
				<div id="message">
				</div>
			<table class="table mt-2 table-striped">
				<thead>
					<tr>
						<th scope="col">
							  <div class="form-group d-flex align-items-start">
								#
							  </div>
						</th>
						<th scope="col">
							<div class="form-group d-flex align-items-end">
							
								<div class="mr-2">
									Название
								</div>
							</div>
						  </th>
						<th scope="col">
							<div class="form-group d-flex ">
								<div class="mr-2 d-flex align-items-end">
									Долгота
								</div>
							</div>
						  </th>
						<th scope="col">
							<div class="form-group d-flex">
								<div class="mr-2 d-flex">
									Широта
								</div>
							</div>
							</th>
						<th scope="col">
							<div class="form-group d-flex align-items-end">
								<div class="mr-2">
									Количество населения
								</div>
							</div>
						</th>
					</tr>
			  </thead>
			  <tbody id="country">
				@if($data)
					@foreach($data as $el)
					<tr>
						<th scope="row">{{$el->id}}</th>
						<td>{{$el->name}}</td>
						<td>{{$el->longitude}}</td>
						<td>{{$el->latitude}}</td>
						<td>{{$el->count_people}}</td>
					 </tr>
					@endforeach
				@else
				<div class="alert mt-2 alert-primary" role="alert">
				  Данных пока нет!
				</div>
				@endif
			  </tbody>
			</table>
		</div>
	</div>
<!-- Button trigger modal -->
@include('footer');