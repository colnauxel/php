<?php if(count($errors) > 0): ?>
    <div class="alert alert-warning" role="alert">
        <?php foreach ($errors as $error ): ?>
         <p><?php echo $error; ?></p>
        <?php endforeach ?>   
    </div>
<?php endif ?>
<?php if(count($msg) > 0): ?>
    <div class="alert alert-success" role="alert">
        <?php foreach ($msg as $m ): ?>
         <p><?php echo $m; ?></p>
        <?php endforeach ?>   
    </div>
<?php endif ?>