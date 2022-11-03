

<?php $__env->startSection('title'); ?>
    Ajouter slider
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenu'); ?>

    <div class="row grid-margin">
        <div class="col-lg-12">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ajouter slider</h4>
                
                <?php if(Session::has('status')): ?>
                    <div class="alert alert-success">
                        <?php echo e(Session::get('status')); ?>

                    </div>
                <?php endif; ?>
                
                <?php if(count($errors)> 0): ?> 
                    <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    </div>
                <?php endif; ?>
                
                <?php echo Form::open(['action' =>'App\Http\Controllers\SliderController@sauverslider','method'=>'POST', 'class' =>'cmxform', 'id'=>'commentForm', 'enctype'=>'multipart/form-data']); ?>

                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                    <?php echo Form::label('', 'Description one', ['for'=>'cname']); ?>

                    <?php echo Form::text('description1', '', ['class'=>'form-control', 'id'=>'cname']); ?>

                    </div>
                    <div class="form-group">
                    <?php echo Form::label('', 'Description two', ['for'=>'cname']); ?>

                    <?php echo Form::text('description2', '', ['class'=>'form-control', 'id'=>'cname']); ?>

                    </div>
                    <div class="form-group">
                    <?php echo Form::label('', 'Image', ['for'=>'cname']); ?>

                    <?php echo Form::file('slider_image', ['class'=>'form-control', 'id'=>'cname']); ?>

                    </div>
                    
                    <?php echo Form::submit('Ajouter', ['class'=>'btn btn-primary']); ?>

                <?php echo Form::close(); ?>

            </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <!-- Custom js for this page-->
  
  <!-- End custom js for this page-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E_Commerce\resources\views/admin/ajouterslider.blade.php ENDPATH**/ ?>