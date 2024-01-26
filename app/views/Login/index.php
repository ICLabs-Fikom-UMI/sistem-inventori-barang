<form action="<?= BASEURL;?>/Login/login" method="post">
<div class="body-login">
<div class="figure">
    <div class="logo">
    <img src="<?=BASEURL;?>img/logo bg hitam.svg" alt="logo">
    </div>
    <div class="content-figure">
    <img id="login-figure" src="<?=BASEURL ?>img/login figure.svg" alt="figure">
    </div>
</div>
<div class="form-login">
    <div class="container1">
      <div class="header">
        <h2>Masuk</h2>
      </div>
      <div class="input">
        <div class="email">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Masukkan email anda" id="email" >
        </div>
        <br>
        <div class="kata-sandi">
            <label for="kata-sandi">Kata sandi</label>
            <input type="password" name="kata-sandi" placeholder="Masukkan kata sandi anda">
            <div class="lupa-kata-sandi">
                <a href="#">Lupa kata sandi?</a>
            </div>
        </div>
      </div>
    <br>
    <div class="button-login">
        <button>Masuk</button>
        <span>
            <p>Belum punya akun?</p>
            &nbsp;
            <a href="<?=BASEURL; ?>Register">Buat akun</a>
        </span>
      </div>
    </div>
</div>
</div>
</div>
</form>

