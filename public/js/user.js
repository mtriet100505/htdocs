
class User{
    constructor() {}

    edit_user = () => {
        $(document).ready(() => {
            $('.btn-edit-user').click(function (){
                let id = $(this).data('id');
                let name = $(this).data('name');
                let age = $(this).data('age');
                let phone = $(this).data('phone');
                let email = $(this).data('email');
                let role = $(this).data('role');

                $('#userIdEdit').val(id);
                $('#fullname_edit').val(name);
                $('#age_edit').val(age);
                $('#phone_edit').val(phone);
                $('#email_edit').val(email);
                $('#role_edit').val(role);
            })
        });
    }

    delete_user = () => {
        $(document).ready(() => {
            $('.btn-delete-user').click(function (){
                let id = $(this).data('id');
                let name = $(this).data('name');

                $('#userIdDelete').val(id);
                $('#userIdDelete-para').html(`Do you want to delete user '${name}' ?`)
            })
        });
    }

    add_user_ajax = () => {
        $(document).ready(() => {
            $('#btn_add').click(function (){
                const name = $('#full_name_add').val();
                const age = $('#age_add').val();
                const phone = $('#phone_add').val();
                const email = $('#email_add').val();
                const password = $('#password_add').val();

                $.ajax({
                    url: '/user/add_ajax',
                    type: 'POST',
                    data: {
                        name,
                        age,
                        phone,
                        email,
                        password
                    },
                    success: function (result, status, xhr){
                        $('#modal__add-user--alert').html(result);
                    },
                    error: function (xhr, status, error){
                        console.log(error);
                    },
                    complete: function (xhr, status){
                        console.log(status);
                    }
                })
            })
        })
    }
}

export default new User();