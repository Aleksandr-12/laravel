<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
<body>
	<div class="container">
		<form action="<?php echo e(route('ajaxSubmit')); ?>"   id="submit_form" method="POST">
			<?php echo csrf_field(); ?>
			<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
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
			<?php if($errors->any()): ?>
			<div class="alert alert-danger">
				<ul>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li><?php echo e($error); ?></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</u>
			</div>
			<?php endif; ?>
			<?php if(session('success')): ?>
			<div class="alert alert-success">
				<?php echo e(session('success')); ?>

			</div>
			<?php endif; ?>
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
				<?php if($data): ?>
					<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $el): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<th scope="row"><?php echo e($el->id); ?></th>
						<td><?php echo e($el->name); ?></td>
						<td><?php echo e($el->longitude); ?></td>
						<td><?php echo e($el->latitude); ?></td>
						<td><?php echo e($el->count_people); ?></td>
					 </tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php else: ?>
				<div class="alert mt-2 alert-primary" role="alert">
				  Данных пока нет!
				</div>
				<?php endif; ?>
			  </tbody>
			</table>
		</div>
	</div>
<!-- Button trigger modal -->
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;<?php /**PATH F:\OSPanel\domains\test_laravel\resources\views/home.blade.php ENDPATH**/ ?>