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
        <h1>Zoznam študentov</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default ">
                <div class="panel-heading">Študenti <a href="<?php echo site_url('studenti/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
				<table class="table striped">
					<thead>
					<tr>
						<th width="20%">ID</th>
						<th width="30%">Meno</th>
						<th width="30%">Priezvisko</th>
						<th width="20%">Akcia</th>
					</tr>
					</thead>
					<tbody id="userData">
					<?php if(!empty($studenti)): foreach($studenti as $student): ?>
						<tr>
							<td><?php echo '#'.$student['id']; ?></td>
							<td><?php echo $student['meno']; ?></td>
							<td><?php echo $student['priezvisko']; ?></td>
							<td>
								<a href="<?php echo site_url('studenti/view/'.$student['id']); ?>"class="glyphicon glyphicon-eye-open"></a>
								<a href="<?php echo site_url('studenti/edit/'.$student['id']); ?>"class="glyphicon glyphicon-edit"></a>
								<a href="<?php echo site_url('studenti/delete/'.$student['id']); ?>"class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
							</td>
						</tr>
					<?php endforeach; else: ?>
						<tr><td colspan="4">Žiadni študenti ......</td></tr>
					<?php endif; ?>
					</tbody>
				</table>
            </div>
        </div>
    </div>
</div>
