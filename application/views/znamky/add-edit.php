<div class="container">
    <div class="row"><br></div>
    <div class="col-xs-12">
        <?php
        if(!empty($success_msg)){
            echo '<div class="alert alert-success">'.$success_msg.'</div>';
        }elseif(!empty($error_msg)){
            echo '<div class="alert alert-danger">'.$error_msg.'</div>';
        }
        ?>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php //echo $action; ?> Známky <a href="<?php echo site_url('znamky/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
                <div class="panel-body">
                    <form method="post" action="" class="form">
                        <div class="form-group">
							<label for="title">Študent</label>
							<input type="text" class="form-control" name="idstudent" id="idstudent" placeholder="Vyberte meno študenta" value="<?php echo !empty($post['idstudent'])?$post['idstudent']:''; ?>">
							<?php echo form_error('idstudent','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Predmet</label>
							<input type="text" class="form-control" name="predmet" id="predmet" placeholder="Vložte predmet" value="<?php echo !empty($post['predmet'])?$post['predmet']:''; ?>">
							<?php echo form_error('predmet','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Dátum</label>
							<input type="text" class="form-control" name="datum" id="datum" placeholder="Vložte dátum" value="<?php echo !empty($post['datum'])?$post['datum']:''; ?>">
							<?php echo form_error('datum','<p class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Známka</label>
							<input type="text" class="form-control" name="znamka" id="znamka" placeholder="Vložte známku" value="<?php echo !empty($post['znamka'])?$post['znamka']:''; ?>">
							<?php echo form_error('znamka','<p class="help-block text-danger">','</p>'); ?>
						</div>
                        <input type="submit" name="postSubmit" class="btn btn-primary" value="Poslať"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
