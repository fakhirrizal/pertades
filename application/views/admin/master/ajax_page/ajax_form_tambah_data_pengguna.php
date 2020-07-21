<?php
/* General Manager */
if($id=='2'){
?>
    <div class="form-group">
        <label>Nama <font color='red'>*</font></label>
        <input type="text" class="form-control" name='nama' placeholder="Nama lengkap sesuai dengan KTP" required>
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" name="alamat" rows="4"></textarea>
    </div>
    <div class="form-group">
        <label>Nomor HP</label>
        <input type="number" class="form-control" name="no_hp">
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Username <font color='red'>*</font></label>
                <input type="text" class="form-control" name="username" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Password <font color='red'>*</font></label>
                <input type="text" class="form-control" name='password' placeholder="Minimal 8 karakter" minlength='8' required>
            </div>
        </div>
    </div>
<?php
}
/* Team Leader */
elseif($id=='3'){
    $get_regional = $this->Main_model->getSelectedData('regional a', 'a.*')->result();
?>
    <div class="form-group">
        <label>Nama <font color='red'>*</font></label>
        <input type="text" class="form-control" name='nama' placeholder="Nama lengkap sesuai dengan KTP" required>
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" name="alamat" rows="4"></textarea>
    </div>
    <div class="form-group">
        <label>Nomor HP</label>
        <input type="number" class="form-control" name="no_hp">
    </div>
    <div class="form-group">
        <label>Regional <font color='red'>*</font></label>
        <select class="form-control" name='id_regional' required>
            <option value=''>-- Pilih --</option>
            <?php
            foreach ($get_regional as $key => $value) {
                echo"<option value='".$value->id_regional."'>".$value->regional."</option>";
            }
            ?>
        </select>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Username <font color='red'>*</font></label>
                <input type="text" class="form-control" name="username" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Password <font color='red'>*</font></label>
                <input type="text" class="form-control" name='password' placeholder="Minimal 8 karakter" minlength='8' required>
            </div>
        </div>
    </div>
<?php
}
/* Tim Site Acuisition */
elseif($id=='4'){
?>
    <div class="form-group">
        <label>Nama <font color='red'>*</font></label>
        <input type="text" class="form-control" name='nama' placeholder="Nama lengkap sesuai dengan KTP" required>
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" name="alamat" rows="4"></textarea>
    </div>
    <div class="form-group">
        <label>Nomor HP</label>
        <input type="number" class="form-control" name="no_hp">
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Username <font color='red'>*</font></label>
                <input type="text" class="form-control" name="username" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Password <font color='red'>*</font></label>
                <input type="text" class="form-control" name='password' placeholder="Minimal 8 karakter" minlength='8' required>
            </div>
        </div>
    </div>
<?php
}
/* Investor */
elseif($id=='5'){
?>
    <div class="form-group">
        <label>Nama <font color='red'>*</font></label>
        <input type="text" class="form-control" name='nama' placeholder="Nama lengkap sesuai dengan KTP" required>
    </div>
    <div class="form-group">
        <label>NIK <font color='red'>*</font></label>
        <input type="text" class="form-control" name='nik' placeholder="" required>
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" name="alamat" rows="4"></textarea>
    </div>
    <div class="form-group">
        <label>Nomor HP</label>
        <input type="number" class="form-control" name="no_hp">
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Username <font color='red'>*</font></label>
                <input type="text" class="form-control" name="username" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Password <font color='red'>*</font></label>
                <input type="text" class="form-control" name='password' placeholder="Minimal 8 karakter" minlength='8' required>
            </div>
        </div>
    </div>
<?php
}
/* Admin BUMDesa */
elseif($id=='6'){
?>
    <div class="form-group">
        <label>Nama <font color='red'>*</font></label>
        <input type="text" class="form-control" name='nama' placeholder="Nama lengkap sesuai dengan KTP" required>
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" name="alamat" rows="4"></textarea>
    </div>
    <div class="form-group">
        <label>Nomor HP</label>
        <input type="number" class="form-control" name="no_hp">
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Username <font color='red'>*</font></label>
                <input type="text" class="form-control" name="username" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Password <font color='red'>*</font></label>
                <input type="text" class="form-control" name='password' placeholder="Minimal 8 karakter" minlength='8' required>
            </div>
        </div>
    </div>
<?php
}
/* Admin SPB Desa */
elseif($id=='7'){
?>
    <div class="form-group">
        <label>Nama <font color='red'>*</font></label>
        <input type="text" class="form-control" name='nama' placeholder="Nama lengkap sesuai dengan KTP" required>
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" name="alamat" rows="4"></textarea>
    </div>
    <div class="form-group">
        <label>Nomor HP</label>
        <input type="number" class="form-control" name="no_hp">
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Username <font color='red'>*</font></label>
                <input type="text" class="form-control" name="username" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Password <font color='red'>*</font></label>
                <input type="text" class="form-control" name='password' placeholder="Minimal 8 karakter" minlength='8' required>
            </div>
        </div>
    </div>
<?php
}
/* Something Else */
else{
    echo'';
}
?>