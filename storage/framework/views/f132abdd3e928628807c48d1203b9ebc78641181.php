;

<?php $__env->startSection('title'); ?>
    Commandes
<?php $__env->stopSection(); ?>
<?php echo Form::hidden('', $increment=1); ?>

<?php $__env->startSection('contenu'); ?>
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Commandes</h4>
        <?php if(Session::has('error')): ?>
            <div class="alert alert-danger">
                <?php echo e(Session::get('error')); ?>

                <?php echo e(Session::put('error',null)); ?>

            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="order-listing" class="table">
                <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Nom du client</th>
                        <th>Adresse</th>
                        <th>Panier</th>
                        <th>Payment id</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($increment); ?></td>
                            <td><?php echo e($order->nom); ?></td>
                            <td><?php echo e($order->adresse); ?></td>
                            <td>
                                <?php $__currentLoopData = $order->panier->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($item['product_name'].', '); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td><?php echo e($order->payment_id); ?></td>
                            <td>
                                <button class="btn btn-outline-primary" onclick="window.location='<?php echo e(url('/voir_pdf/'.$order->id)); ?>'">View</button>
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
<?php echo $__env->make('layouts.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E_Commerce\resources\views/admin/commandes.blade.php ENDPATH**/ ?>