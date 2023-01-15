
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo e(__('message.title')); ?></h1>
          </div>
        </div>
      </div>
    </section>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2><?php echo e(__('message.task')); ?></h2></div>
                </div>
                <div class="col-sm-12 d-flex justify-content-between p-3">
                    <div class="d-flex justify-content-between">
                        <a href="<?php echo e(route('task.create')); ?>" class="btn btn-primary"><?php echo e(__('message.+add task')); ?></a>


                        <select class="btn btn-secondary dropdown-toggle ml-2" name="filter" id="filter">
                            <option value=""><?php echo e(__('message.all_briefs')); ?></option>
                            <?php $__currentLoopData = $brief; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->Nom_du_brief); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="search-box">
                        <i class="material-icons">&#xE8B6;</i>
                        <input type="text" class="form-control" id="search" placeholder="Search&hellip;">
                        <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                    </div>

                </div>
            </div>

    <table class="table table-striped table-hover table-bordered">
      <thead>
          <tr>
              <th><?php echo e(__('message.name')); ?></th>
              <th><?php echo e(__('message.duration')); ?></th>
              <th><?php echo e(__('message.actions')); ?></th>
          </tr>
      </thead>
      <tbody id="tbody">
        <?php echo $__env->make('tasks.pagination_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       </tbody>
  </table>
  <div class="d-flex justify-content-between">
      <div>
          <a href="<?php echo e(route('generate')); ?>" class="btn btn-outline-secondary" ><?php echo e(__('message.export_pdf')); ?></a>
          <a href="/exportexcel" class="btn btn-outline-secondary" ><?php echo e(__('message.export_excel')); ?></a>
          <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal">
            <?php echo e(__('message.import_excel')); ?>

            </button>
       </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('message.modal_title')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="/importexcel" method="POST" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>

              <div class="modal-body">
                      <div class="form-group">
                          <input type="file" name="file" required>
                      </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('message.close_btn')); ?></button>
                <button type="submit" class="btn btn-primary"><?php echo e(__('message.save')); ?></button>
              </div>
            </div>
          </form>
          </div>
        </div>
  </div>
</div>
</div>
</div>
<script>
    $(document).ready(function(){
function fetch_data(page,query)
{
$.ajax({
 url:"/pagination/fetch_data?page="+page+"&query="+query,
 success:function(data)
 {
  // console.log(data);
  $('tbody').html('');
  $('tbody').html(data);
 }
})
}

$(document).on('keyup', '#search', function(){
var query = $('#search').val();
var page = $('#hidden_page').val();
fetch_data(page,query);
});


$(document).on('click', '.pagination a', function(event){
event.preventDefault();
var page = $(this).attr('href').split('page=')[1];
$('#hidden_page').val(page);
var query = $('#search').val();
console.log(page);
console.log(query);
fetch_data(page,query);
});

});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\GITHUB\gestion-breifs-projets\back-end\resources\views/tasks/index.blade.php ENDPATH**/ ?>