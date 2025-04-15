<?php

    /**
     * @var $data
     */
    $userLogin = $data["userLogin"];
    $roleName = $userLogin->getRoleName();
?>

<div class="container">
    <div class="row">
        <div class="text-right w-100 p-3">
            <button class="btn btn-danger ml-3" data-toggle="modal" data-target="#logout" style="float: right">Logout</button>
            <?php
                if($roleName == "Admin"){
            ?>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#add-user" style="float: right">Add User</button>
            <?php
                }
            ?>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
            <?php
                $index = 1;
                foreach ($data["users"] as $user)
                {
                    $id = $user->getId();
                    $name = $user->getName();
                    $age = $user->getAge();
                    $phone = $user->getPhone();
                    $email = $user->getEmail();
                    $role_id = $user->getRoleId();
                    $role_name = $user->getRoleName();
            ?>
                <tr>
                    <td><?= $index ?></td>
                    <td><?= $name ?></td>
                    <td><?= $age ?></td>
                    <td><?= $phone ?></td>
                    <td><?= $email ?></td>
                    <td><?= $role_name ?></td>
                    <td>
                        <?php

                            if($roleName == "Admin"){
                        ?>
                            <a data-id="<?= $id ?>"
                               data-name="<?= $name ?>"
                               data-age="<?= $age ?>"
                               data-phone="<?= $phone ?>"
                               data-email="<?= $email ?>"
                               data-role="<?= $role_name ?>"
                               data-toggle="modal" data-target="#edit-user" class="btn-info btn btn-edit-user">Edit</a>
                            <a data-id="<?= $id ?>" data-name="<?= $name ?>" data-toggle="modal" data-target="#delete-user" class="btn-danger btn btn-delete-user">Delete</a>
                        <?php
                            }
                        ?>

                    </td>
                </tr>
            <?php
                    $index++;
                }
            ?>
            </tbody>
        </table>
    </div>
</div>


<!--    add modal -->
<div class="modal fade" id="add-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <form onsubmit="return true" action="/user/add" method="post" >

                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="full_name_add">Full name</label>
                            <input class="form-control" type="text" name="full_name_add" id="full_name_add" placeholder="Full name">
                        </div>

                        <div class="form-group">
                            <label for="email_add">Age</label>
                            <input class="form-control" type="number" name="age_add" id="age_add" placeholder="Age">
                        </div>

                        <div class="form-group">
                            <label for="phone_add">Phone number</label>
                            <input class="form-control" type="number" name="phone_add" id="phone_add" placeholder="Phone number">
                        </div>

                        <div class="form-group">
                            <label for="email_add">Email</label>
                            <input class="form-control" type="text" name="email_add" id="email_add" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label for="password_add">Password</label>
                            <input class="form-control" type="password" name="password_add" id="password_add" placeholder="Password">
                        </div>

                    </div>
                </div>

                <div id="modal__add-user--alert" class="text-center mb-2 d-flex flex-wrap justify-content-center">

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">

                    <button name="btn_submit_add" id="btn_add" class="btn btn-primary btn__add-user">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--    edit modal -->
<div class="modal fade" id="edit-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/user/edit" method="post">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <!-- ID item đc click gắn ở đây, kéo lên mục edit chỉnh lại data-id -->
                        <input type="hidden" name="userIdEdit" id="userIdEdit" value="">

                        <div class="form-group login-form--info">
                            <label class="login-form__label" for="fullname_edit">Full name</label>
                            <input class="form-control login-form__input" type="text" name="full_name_edit" id="fullname_edit" placeholder="Full name" required>
                        </div>

                        <div class="form-group login-form--info">
                            <label class="login-form__label" for="age_edit">Age</label>
                            <input class="form-control login-form__input" type="number" name="age_edit" id="age_edit" placeholder="Age" required>
                        </div>

                        <div class="form-group login-form--info">
                            <label class="login-form__label" for="phone_edit">Phone</label>
                            <input class="form-control login-form__input" type="number" name="phone_edit" id="phone_edit" placeholder="Phone number" required>
                        </div>

                        <div class="form-group login-form--info">
                            <label class="login-form__label" for="email_edit">Email</label>
                            <input class="form-control login-form__input" type="text" name="email_edit" id="email_edit" placeholder="Email" required>
                        </div>

                        <div class="form-group login-form--info">
                            <label class="login-form__label" for="role_edit">Role</label>
                            <select class="form-control" name="role_edit" id="role_edit">
                                <?php
                                    foreach ($data["roles"] as $role){
                                        $role_name = $role->getRoleName();
                                ?>
                                        <option value="<?= $role_name ?>"><?= $role_name ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="btn_submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--    delete modal -->
<div class="modal fade" tabindex="-1"  id="delete-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/user/delete" method="post">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Delete User</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <!-- ID item đc click gắn ở đây, kéo lên mục delete chỉnh lại data-id -->
                        <input type="hidden" name="userIdDelete" id="userIdDelete" value="">

                        <p id="userIdDelete-para"></p>

                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="btn_delete" class="btn btn-primary">Delete</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1"  id="logout">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/logout" method="post">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Logout</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <p>Do you want to log out ?</p>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="btn_delete" class="btn btn-primary">Confirm</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        if(window.edit_user){
            edit_user()
        }
        if(window.add_user_ajax){
            add_user_ajax()
        }
        if(window.delete_user){
            delete_user()
        }
    })

</script>