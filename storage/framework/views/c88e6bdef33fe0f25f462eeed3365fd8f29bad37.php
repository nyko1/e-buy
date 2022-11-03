;

<?php $__env->startSection('title'); ?>
    Produits
<?php $__env->stopSection(); ?>
<?php echo Form::hidden('', $increment=1); ?>

<?php $__env->startSection('contenu'); ?>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Produits</h4>
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
                                <th>Image</th>
                                <th>Nom du Produit</th>
                                <th>Catégorie du Produit</th>
                                <th>Prix</th>
                                <th>Satatus</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($increment); ?></td>
                                    <td><img src="/storage/product_images/<?php echo e($produit->product_image); ?>" alt=""></td>
                                    <td><?php echo e($produit->product_name); ?></td>
                                    <td><?php echo e($produit->product_category); ?></td>
                                    <td><?php echo e($produit->product_price); ?></td>
                                    <td>
                                        <?php if($produit->status == 1): ?>
                                        <label class="badge badge-success">Activé</label>
                                        <?php else: ?>
                                            <label class="badge badge-danger">Désactivé</label> 
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-primary" onclick="window.location='<?php echo e(url('/edit_produit/'.$produit->id)); ?>'">Edit</button>
                                        <a href="<?php echo e(url('/supprimerproduit/'.$produit->id)); ?>" id="delete" class="btn btn-outline-danger">Delete</a>
                                        <?php if($produit->status == 1): ?>
                                            <button class="btn btn-outline-warning" onclick="window.location='<?php echo e(url('/desactiver_produit/'.$produit->id)); ?>'">Désactiver</button>
                                        <?php else: ?>
                                            <button class="btn btn-outline-success" onclick="window.location='<?php echo e(url('/activer_produit/'.$produit->id)); ?>'">Activer</button>
                                        <?php endif; ?>
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
<?php echo $__env->make('layouts.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E_Commerce\resources\views/admin/produits.blade.php ENDPATH**/ ?>