<?php

    /**
     * @var $data
     * */
?>

<form action="/login" method="post" class="">
    <div style="height: 100vh" class="form-group d-flex flex-wrap justify-content-center align-items-center">
        <div style="width: 50%; border-radius: 20px" class="card p-5">
            <h1 class=text-center>Login</h1>
            <div class="form-group">
                <label for="email" class="form-label">
                    Email
                </label>
                <input placeholder="Enter email..." value="<?= $data['email'] ?? '' ?>" type="text"
                       name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="pwd" class="form-label">
                    Password
                </label>
                <input placeholder="Enter password..." value="<?= $data['password'] ?? '' ?>" type="password"
                       name="password" id="pwd" class="form-control">
            </div>
            <?php
            if (isset($data['error'])) {
                ?>
                <div id="modal__add-user--alert"
                     class="text-center mb-2 d-flex flex-wrap justify-content-center alert alert-danger">
                    <p class="mb-0"><?= $data['error'] ?></p>
                </div>
                <?php
            }
            ?>
            <div class="d-flex flex-wrap justify-content-end mt-3">
                <button class="btn btn-primary w-100">
                    Login
                </button>
            </div>
        </div>
    </div>
</form>

