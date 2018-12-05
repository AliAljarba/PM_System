<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <title>Projects List</title>
</head>
<body>
<div class="container">
  <div class="col-md-offset-2 col-md-8">
    <div class="row">
      <h1>Projects List</h1>
    </div>

    
    <?php if(Session::has('success')): ?>
      <div class="alert alert-success">
        <strong>Success:</strong> <?php echo e(Session::get('success')); ?>

      </div>
    <?php endif; ?>

    
    <?php if(count($errors) > 0): ?>
      <div class="alert alert-danger">
        <strong>Error:</strong>
        <ul>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <li><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </ul>
      </div>
    <?php endif; ?>

    <div class="row">
      <form action="<?php echo e(route('projects.update', [$projectUnderEdit->id])); ?>" method='POST'>
      <?php echo e(csrf_field()); ?>

      <input type="hidden" name='_method' value='PUT'>

        <div class="form-group">
          <input type="text" name='updatedProjectName' class='form-control input-lg' value='<?php echo e($projectUnderEdit->name); ?>'>
        </div>

        <div class="form-group">
          <input type="submit" value='Save Changes' class='btn btn-success btn-lg'>
          <a href="" class='btn btn-danger btn-lg pull-right'>Go Back</a>
        </div>
      </form>
    </div>

 
  </div>
</div>
</body>
</html>