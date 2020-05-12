<div class="container">
    <?php if(!empty($success_msg)){ ?>
        <div class="col-xs-12">
            <div class="alert alert-success"><?php echo $success_msg; ?></div>
        </div>
    <?php }elseif(!empty($error_msg)){ ?>
        <div class="col-xs-12">
            <div class="alert alert-danger"><?php echo $error_msg; ?></div>
        </div>
    <?php } ?>
    <div class="row">
        <h1>Zoznam známok</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default ">
                <div class="panel-heading">Pridať známku <a href="<?php echo site_url('znamky/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
				<table class="table striped">
					<thead>
					<tr>
						<th width="10%">ID</th>
						<th width="25%">Študent</th>
						<th width="25%">Predmet</th>
						<th width="20%">Dátum</th>
						<th width="10%">Známka</th>
						<th width="10%">Akcie</th>
					</tr>
					</thead>
					<tbody id="userData">
					<?php if(!empty($znamky)): foreach($znamky as $znamka): ?>
						<tr>
							<td><?php echo '#'.$znamka['id']; ?></td>
							<td><?php echo $znamka['idstudent']; ?></td>
							<td><?php echo $znamka['predmet']; ?></td>
							<td><?php echo $znamka['datum']; ?></td>
							<td><?php echo $znamka['znamka']; ?></td>
							<td>
								<a href="<?php echo site_url('znamky/view/'.$znamka['id']); ?>"class="glyphicon glyphicon-eye-open"></a>
								<a href="<?php echo site_url('znamky/edit/'.$znamka['id']); ?>"class="glyphicon glyphicon-edit"></a>
								<a href="<?php echo site_url('znamky/delete/'.$znamka['id']); ?>"class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
							</td>
						</tr>
					<?php endforeach; else: ?>
						<tr><td colspan="4">Žiadne známky ......</td></tr>
					<?php endif; ?>
					</tbody>
				</table>
            </div>
        </div>
    </div>

	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default ">
				<div class="panel-heading">Pridať známku <a href="<?php echo site_url('znamky/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
				<table class="table striped">
					<thead>
					<tr>
						<th width="10%">ID</th>
						<th width="25%">Študent</th>
						<th width="25%">Predmet</th>
						<th width="20%">Dátum</th>
						<th width="10%">Známka</th>
						<th width="10%">Akcie</th>
					</tr>
					</thead>
					<tbody id="userData">
					<?php if(!empty($znamky2)): foreach($znamky2 as $znamka): ?>
						<tr>
							<td><?php echo '#'.$znamka['id']; ?></td>
							<td><?php echo $znamka['cele_meno']; ?></td>
							<td><?php echo $znamka['predmet']; ?></td>
							<td><?php echo $znamka['datum']; ?></td>
							<td><?php echo $znamka['znamka']; ?></td>
							<td>
								<a href="<?php echo site_url('znamky/view/'.$znamka['id']); ?>"class="glyphicon glyphicon-eye-open"></a>
								<a href="<?php echo site_url('znamky/edit/'.$znamka['id']); ?>"class="glyphicon glyphicon-edit"></a>
								<a href="<?php echo site_url('znamky/delete/'.$znamka['id']); ?>"class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
							</td>
						</tr>
					<?php endforeach; else: ?>
						<tr><td colspan="4">Žiadne známky ......</td></tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
