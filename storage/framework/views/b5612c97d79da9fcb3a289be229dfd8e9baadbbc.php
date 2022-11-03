;

<?php $__env->startSection('title'); ?>
    Catégories
<?php $__env->stopSection(); ?>
<?php echo Form::hidden('', $increment=1); ?>


<?php $__env->startSection('contenu'); ?>
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Catégories</h4>
        
        <?php if(Session::has('status')): ?>
            <div class="alert alert-success">
            <?php echo e(Session::get('status')); ?>

            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="order-listing" class="table">
                <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Nom de la Catégorie</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($increment); ?></td>
                            <td><?php echo e($category->category_name); ?></td>
                            
                            <td>
                                <button class="btn btn-outline-primary" onclick="window.location='<?php echo e(url('/editcategorie/'.$category->id)); ?>'">Edit</button>
                                <a href="<?php echo e(url('/supprimercategorie/'.$category->id)); ?>" id="delete" class="btn btn-outline-danger">Delete</a>
                            </td>
                        </tr>
                        <?php echo Form::hidden('', $increment= $increment+1); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="backend/js/data-table.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E_Commerce\resources\views/admin/categories.blade.php ENDPATH**/ ?>