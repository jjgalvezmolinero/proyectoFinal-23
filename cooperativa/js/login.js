$(document).ready(function(){
  let btn_logearse = $('#loguearse');
  let login_form_email = $('#email');
  let login_form_pass = $('#password');
  let login_form_recordar = $('#recordar');
  setLoginValues();
  
  btn_logearse.click(function () {
    login();
  });

  function login() {
    if(login_form_recordar.is(':checked')) {
      setCookie('username',login_form_email.val());
      setCookie('pass',login_form_pass.val());
    }
    let datos = {
      'user':login_form_email.val(),
      'pass':login_form_pass.val()
    }
    $.ajax(
      {
        url: 'src/controller/login.php',
        type: 'POST',
        data: datos
      }
    ). done (function(data){
      if(data == 1) {
        document.location.href = '/'
      } else if (data == 0) {
        alert('Error');
      }
    });
  }

  function setLoginValues() {
    let login_form_email = $('#email');
    let login_form_pass = $('#password');

    let username=getCookie('username');
    let pass=getCookie('pass');

    login_form_email.val(username);
    login_form_pass.val(pass);
  }
})