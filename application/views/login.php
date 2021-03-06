<div class="page-title-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-content">
                        <h2>Masuk</h2>
                        <ul>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>
                                <span>Masuk</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="title-img">
            <img src="<?php echo base_url(); ?>assets/client/assets/images/page-title1.jpg" alt="About">
            <img src="<?php echo base_url(); ?>assets/client/assets/images/shape16.png" alt="Shape">
            <img src="<?php echo base_url(); ?>assets/client/assets/images/shape17.png" alt="Shape">
            <img src="<?php echo base_url(); ?>assets/client/assets/images/shape18.png" alt="Shape">
        </div>
    </div>


    <div class="user-area ptb-100">
        <div class="container">
            <div class="user-item">
                <form method="POST" action="<?php echo base_url(); ?>login/aksi_login">
                    <h2>Masuk</h2>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username:">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password:">
                    </div>
                    <button type="submit" class="btn common-btn">
                        Login
                        <img src="<?php echo base_url(); ?>assets/client/assets/images/shape1.png" alt="Shape">
                        <img src="<?php echo base_url(); ?>assets/client/assets/images/shape2.png" alt="Shape">
                    </button>
                    <h5>Belum Punya Akun? <a href="<?php echo base_url(); ?>daftar">Daftar</a></h5>
                </form>
            </div>
        </div>
    </div>