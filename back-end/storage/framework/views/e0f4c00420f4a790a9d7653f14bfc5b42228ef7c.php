<?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
       <td><?php echo e($row->id); ?></td>
       <td><?php echo e($row->Nom_tache); ?></td>
       <td><?php echo e($row->Description); ?></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <tr>
       <td colspan="3" align="center">
        <?php echo $tasks->links(); ?>

       </td>
      </tr>

<?php /**PATH C:\wamp64\www\GITHUB\gestion-breifs-projets\back-end\resources\views/tasks/pagination_data.blade.php ENDPATH**/ ?>