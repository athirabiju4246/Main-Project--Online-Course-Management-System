<html>
<script>

function validate($check) {
    // var log_uid = document.login.email;
    // var log_password = document.login.password;
    // var rname = document.regform.rname;
    // var remail = document.regform.remail;
    // var phone = document.regform.phone;
    // var password = document.login.password;
    // var password = document.login.password;

    var reg_firstname = document.getElementById("reg_firstname");
    var reg_lastname = document.getElementById("reg_lastname");
    var reg_email = document.getElementById("reg_email");
    var reg_phone = document.getElementById("reg_phone");
    var reg_password = document.getElementById("reg_password");
    var reg_confpassword = document.getElementById("reg_confpassword");

    if (reg_password.value != reg_confpassword.value) {
        alert("Both passwords don't match !!");
        reg_password.value = "";
        reg_confpassword.value = "";
        reg_password.focus();
        return false;

    } else {
        return true;
    }


}
</script>
</html>