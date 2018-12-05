<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd"
    });
</script>

  <title>Task List</title>
</head>
<body>
<div class="container">
  <div class="col-md-offset-2 col-md-8">
    <div class="row">
      <h1>Task List</h1>
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

    <div class="row" style='margin-top: 10px; margin-bottom: 10px;'>
      <form action="<?php echo e(route('tasks.store')); ?>" method='POST'>
      <?php echo e(csrf_field()); ?>


        <div class="col-md-9">
          <input type="text" name='newTaskName' class='form-control' placeholder='Write Task Name'>
          
          <input type="text" name='S_Date' class='date' placeholder='Start Date yy-mm-dd'>
        </div>

        <div class="col-md-3">
          <input type="submit" class='btn btn-primary btn-block' value='Add Task'>
        </div>
      </form>
    </div>

    
    <?php if(count($storedTasks) > 0): ?>
      <table class="table">
        <thead>
          <th>Task #</th>
          <th>Name</th>
          <th>start date</th>
          <th>Edit</th>
          <th>Delete</th>
        </thead>

        <tbody>
          <?php $__currentLoopData = $storedTasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $storedTask): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <tr>
              <th><?php echo e($storedTask->id); ?></th>
              <td><?php echo e($storedTask->name); ?></td>
              <td><?php echo e($storedTask->S_Date); ?></td>
              <td><a href="<?php echo e(route('tasks.edit', ['tasks'=>$storedTask->id])); ?>" class='btn btn-default'>Edit</a></td>
              <td>
                <form action="<?php echo e(route('tasks.destroy', ['tasks'=>$storedTask->id])); ?>" method='POST'>
                  <?php echo e(csrf_field()); ?>

                  <input type="hidden" name='_method' value='DELETE'>

                  <input type="submit" class='btn btn-danger' value='Delete'>
                </form>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </tbody>
      </table>
    <?php endif; ?>
    
    <div class="row text-center">
      <?php echo e($storedTasks->links()); ?>

    </div>

  </div>
</div>

</body>
</html>