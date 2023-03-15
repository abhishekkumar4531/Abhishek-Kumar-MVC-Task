<link rel="stylesheet" href="<?php echo BASEURL; ?>/assets/css/style.css?version=1">
<script src="<?php echo BASEURL; ?>/assets/js/validity.js?newversion"></script>
<script type="text/javascript">
reg_obj = new Validity();
function checkFname(){
    var user_name = document.getElementById('first_name').value;
    reg_obj.checkName(user_name, "invalid_fname", "submitBtn", "red");
}
function checkLname(){
    var user_name = document.getElementById('last_name').value;
    reg_obj.checkName(user_name, "invalid_lname", "submitBtn", "red");
}
function checkPhoneNo(){
    var user_mobile = document.getElementById('mobile').value;
    reg_obj.checkPhone(user_mobile, "invalid_mobile", "submitBtn", "red");
}
function checkEmailStatus(){
    var user_email = document.getElementById('email').value;
    reg_obj.checkEmail(user_email, "email_status", "submitBtn");
}
function checkPasswordStatus(){
    var user_pwd = document.getElementById('pwd').value;
    reg_obj.checkPasswords(user_pwd, "pwd_status", "submitBtn");
}
</script>