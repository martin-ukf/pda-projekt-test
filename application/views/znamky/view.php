<div class="container">
	<div class="row"><br></div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Detail záznamu <a href="<?php echo site_url('znamky/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
			<div class="panel-body">
				<div class="form-group">
					<label>ID:</label>
					<p><?php echo !empty($znamky['id'])? $znamky['id']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Študent nesprávne:</label>
					<p><?php echo !empty($znamky['idstudent'])? $znamky['idstudent']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Študent správne:</label>
					<p><?php echo !empty($znamky2['cele_meno'])? $znamky2['cele_meno']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Predmet:</label>
					<p><?php echo !empty($znamky['predmet'])? $znamky['predmet']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Dátum:</label>
					<p><?php echo !empty($znamky['datum'])? $znamky['datum']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Známka:</label>
					<p><?php echo !empty($znamky['znamka'])?$znamky['znamka']:''; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
