
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?php echo e(__('message.btn_assign')); ?></h1>
                    </div>
                    
                </div>
            </div>
        </section>

        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">

                    <form action="<?php echo e(route('form')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h2><?php echo e(__('message.message_prf')); ?></h2>
                                </div>
                            </div>
                            <div class="col-sm-12 d-flex flex-end p-3">

                                
                                <select class="custom-select" id="select" name="select">
                                    <option value=""><?php echo e(__('message.select_brief')); ?>:</option>
                                    <?php $__currentLoopData = $brief; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value->id); ?>">
                                            <?php echo e($value->Nom_du_brief); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                
                                

                                
                                <select class="btn btn-dark dropdown-toggle" name="filter" id="filter">
                                    <option value=""><?php echo e(__('message.all_groups')); ?></option>
                                    <?php $__currentLoopData = $promo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value->id); ?>"><?php echo e($value->Nom_groupe); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                
                            </div>
                        </div>

                        <!-- message de validation -->
                        <?php if(Session::has('success')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(Session::get('success')); ?>

                            </div>
                        <?php endif; ?>
                        <!--  -->
                        <!-- message d'erreur -->
                        <?php if(Session::has('fail')): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo e(Session::get('fail')); ?>

                            </div>
                        <?php endif; ?>
                        <!--  -->

                        <table class="table table-striped table-hover table-bordered">
                            <thead class="table-primary">
                                <th>
                                    <div class="form-check for-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"
                                            onclick='checkUncheck(this)'>
                                        <label class="form-check-label"
                                            for="flexSwitchCheckDefault"><?php echo e(__('message.checkbox_tous')); ?></label>
                                    </div>
                                </th>
                            </thead>
                            <tbody id="table1">

                                <?php if(count($apprenants) > 0): ?>
                                    <?php $__currentLoopData = $apprenants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="<?php echo e($student->id); ?>" id="defaultCheck" name="check[]">
                                                    <label class="form-check-label" for="defaultCheck">
                                                        &nbsp;<?php echo e($student->Nom); ?>&nbsp;<?php echo e($student->Prenom); ?>

                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <td>Aucun apprenant</td>
                                    </tr>
                                <?php endif; ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex justify-content-start">
                                                <button type="submit" class="btn btn-outline-primary">
                                                    <?php echo e(__('message.btn_affecter')); ?>

                                                </button>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                    </form>
                </div>
            </div>
        </div>
        <br>
    </div>

    <script type="text/javascript">
        $('#filter').on('change', function() {
            $value = $(this).val();

            $.ajax({
                type: 'get',
                url: '<?php echo e(route('filter_par_group')); ?>',
                data: {
                    'filter': $value
                },

                success: function(data) {

                    console.log(data);
                    var apprenants = data.apprenants;
                    var html = '';

                    if (apprenants.length > 0) {
                        for (let i = 0; i < apprenants.length; i++) {
                            html +=
                                '<tr>\
                                    <td>\
                                    <div class="form-check">\
                                    <input class="form-check-input" type="checkbox" value="' + apprenants[i]['id'] + '" id="defaultCheck" name="check[]">\
                                    <label class="form-check-label" for="defaultCheck1">\
                                        ' + apprenants[i]['Nom'] + ' &nbsp; ' + apprenants[i]['Prenom'] + '\
                                    </label>\
                                    </div>\
                                    </td>\
                                </tr>';
                        }
                    } else {
                        html += '<tr>\
                                    <td>Aucun apprenant</td>\
                                </tr>';
                    }
                    $('#table1').html(html);
                }
            });
        })

        // $('#select').on('change', function() {
        //     $value = $(this).val();
        //     document.getElementById("id_input").innerHTML = $value;
        // })


        function checkUncheck(main) {
            all = document.getElementsByName("check[]");
            for (var a = 0; a < all.length; a++) {
                all[a].checked = main.checked;
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\GITHUB\gestion-breifs-projets\back-end\resources\views/assigner/index.blade.php ENDPATH**/ ?>