<?php $__env->startSection('content'); ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <?php echo $__env->make('common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <form action="<?php echo e(url('task')); ?>" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label" >Task</label>
                    <div class="col-sm-6">
                        <input type="text" name="name" id="name" class="form-control"/>
                    </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">Add Task</button>
                    </div>
                </div>
                <?php echo e(csrf_field()); ?>

            </form>
        </div>
    </dvi>

    <?php if($tasks->count()): ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                Current tasks
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <th>Task</th>
                        <th>&nbsp</th>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($task->name); ?></td>
                                    <td>
                                        <form action="<?php echo e(url('task/' . $task->id)); ?>" method="post">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                            <?php echo e(method_field('DELETE')); ?>

                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </td>
                                </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>