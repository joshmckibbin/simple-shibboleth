const userEditForm = document.getElementById('your-profile');

if ( userEditForm ) {
    userEditForm.querySelector('#first_name').readOnly = true;
    userEditForm.querySelector('#last_name').readOnly = true;
    userEditForm.querySelector('#nickname').readOnly = true;
    userEditForm.querySelector('#email').readOnly = true;
}
