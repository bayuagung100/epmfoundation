<?php
function buka_tabel_program($judul)
{
	echo '
	<div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
					<th style="width: 10px">No</th>';
	foreach ($judul as $jdl) {
		echo '<th>' . $jdl . '</th>';
	}
	echo '
					<th style="width: 120px">Aksi</th>
				</tr>
			</thead>
			<tbody>';
}
function isi_table_program($no, $data, $link, $id, $edit = true, $hapus = true)
{
	echo '
				<tr>
					<td>' . $no . '</td>';
	foreach ($data as $dt) {
		echo '<td>' . $dt . '</td>';
	}
	echo '<td>';
	if ($edit) {
		echo '<a href="' . $link . '&show=form&id=' . $id . '" class="btn btn-primary btn-sm">
				<i class="fas fa-pencil-alt"></i> Edit
			</a> ';
	}
	if ($hapus) {
		echo '<a href="' . $link . '&show=delete&id=' . $id . '" class="btn btn-danger btn-sm">
				<i class="fas fa-trash"></i> Hapus
			</a>';
	}
	echo '</td>
		</tr>';
}
function tutup_tabel_program($judul)
{
	echo '		
			</tbody>	
			<tfoot>
				<tr>
					<th style="width: 10px">No</th>';
	foreach ($judul as $jdl) {
		echo '<th>' . $jdl . '</th>';
	}
	echo '
					<th style="width: 90px">Aksi</th>
				</tr>
			</tfoot>
		</table>
	</div>';
}
?>