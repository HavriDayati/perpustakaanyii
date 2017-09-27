<?php
use yii\helpers\Url;
use app\models\Jenis;
use app\models\Penulis;
use app\models\Buku;
use app\models\Penerbit;
?>
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Pencarian Buku</h3>
    </div>
<div class="container">
    <section class="col-lg-8">
        <div class="table-responsive">
            
</div>
    
        <table class="table table-border">
        <thead>
        <tbody>
        <tr>
            <td>Nama Buku</td>
            <td>:</td>
            <td><input class="form-control" type="text" name="nama" required></td>
        </tr>
        <tr>
        	<td>Jenis Buku</td>
            <td>:</td>
            <td><select class="form-control" type="text" name="nama" required>
            <option>Pilih Jenis Buku</option>
            <?php $i=1; foreach (Jenis::find()->all() as $data): ?>
			<option><?= $data->nama ?></option>
			 <?php $i++; endforeach; ?>
			 </select>
            </td>
        </tr>
        <tr>
        	<td>Penerbit Buku</td>
            <td>:</td>
            <td><select class="form-control" type="text" name="nama" required>
            <option>Pilih Penerbit Buku</option>
            <?php $i=1; foreach (Penerbit::find()->all() as $data): ?>
			<option><?= $data->nama ?></option>
			 <?php $i++; endforeach; ?>
			 </select>
            </td>
        </tr>
        <tr>
        	<td>Penulis Buku</td>
            <td>:</td>
            <td><select class="form-control" type="text" name="nama" required>
            <option>Pilih Penulis Buku</option>
            <?php $i=1; foreach (Penulis::find()->all() as $data): ?>
			<option><?= $data->nama ?></option>
			 <?php $i++; endforeach; ?>
			 </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Search" name="submit"></td>
        </tr>
        </tbody>
        </thead>
    </table>
    </div>
    </div>
</form>

</body>
</html>