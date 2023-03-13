//Validity class is responsible for Form-Validation using JavaScript.
class Validity{
  /*
  check_valid variable is type of RegeX variable and used for user name validations.
  simlarlly, check_phone for user phone number and check_email for user email.
  */
  check_valid = /^[A-Za-z]+$/;
  check_phone = /^(\+91)[0-9]{10}$/;
  check_email = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  check_pwd = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;

  /**
   * 'checkName/Phone/Email/Passwords' is parametrised method;
   * 'invalidName/Phone/Email/Passwords' is a variable which hold 'id' of a html tag where error msg should show;
   * 'submitBtn' is a variable which hold 'id' of submit button;
   * 'type' is a vraible which hold color;

   * checkName(userName/Phone, invalidName/Phone, submitBtn, type){
   * if userName/Phone is not matched with RegeX expression then :
      At first error message should show.
      And then disable the submit button.
   * if matched then :
      Error message should not show.
      And enable the submit button.
   * }

   * checkEmail/Passwords's working process is same only change in message display like :
      if condition is true then display success message and if false then display error message.
  */

  //checkName is a parametrised method which is responsible for the validation of user name.
  checkName(userName, invalidName, submitBtn, type){
    if(!(userName.match(this.check_valid))){
      document.getElementById(invalidName).innerHTML = `<span style="color:${type};">Enter only alphabets<span>`;
      document.getElementById(submitBtn).disabled = true;
    }
    else{
      document.getElementById(invalidName).innerHTML = '';
      document.getElementById(submitBtn).disabled = false;
    }
  }

  //checkPhone is a parametrised method which is responsible for the validation of user phone number.
  checkPhone(userPhone, invalidPhone, submitBtn, type){
    if(!(userPhone.match(this.check_phone))){
      document.getElementById(invalidPhone).innerHTML = `<span style="color:${type};">Enter only 10 digits number and country code<span>`;
      document.getElementById(submitBtn).disabled = true;
    }
    else{
      document.getElementById(invalidPhone).innerHTML = '';
      document.getElementById(submitBtn).disabled = false;
    }
  }

  //checkEmail is a parametrised method which is responsible for the validation of user email.
  checkEmail(userEmail, emailStatus, submitBtn){
    if(!(userEmail.match(this.check_email))){
      document.getElementById(emailStatus).innerHTML = `<span style="color:red;">Enter a valid-email syntax<span>`;
      document.getElementById(submitBtn).disabled = true;
    }
    else{
      document.getElementById(emailStatus).innerHTML = `<span style="color:green;">This is valid-email syntax<span>`;
      document.getElementById(submitBtn).disabled = false;
    }
  }

  //checkPasswords is a parametrised method which is responsible for the validation of user passwords.
  checkPasswords(userPwd, pwdStatus, submitBtn){
    if(!(userPwd.match(this.check_pwd))){
      document.getElementById(pwdStatus).innerHTML = `<span style="color:red;">Enter a valid-password:Xyz@1<span>`;
      document.getElementById(submitBtn).disabled = true;
    }
    else{
      document.getElementById(pwdStatus).innerHTML = `<span style="color:green;">This is valid-password<span>`;
      document.getElementById(submitBtn).disabled = false;
    }
  }

  //comparePasswords is a parametrised method which is comparing user entered passwords.
  diffPasswords(newPassword, rePassword, passStatus, submitBtn){
    if(newPassword === rePassword){
      document.getElementById(passStatus).innerHTML = `<span>New password should't same</span>`;
      document.getElementById(submitBtn).disabled = true;
    }
    else{
      document.getElementById(passStatus).innerHTML = ``;
      document.getElementById(submitBtn).disabled = false;
    }
  }

  samePasswords(newPassword, rePassword, passStatus, submitBtn){
    if(newPassword === rePassword){
      document.getElementById(passStatus).innerHTML = ``;
      document.getElementById(submitBtn).disabled = false;
    }
    else{
      document.getElementById(passStatus).innerHTML = `<span>Set password should be same</span>`;
      document.getElementById(submitBtn).disabled = true;
    }
  }
}