$(document).ready(function(){
  let btn_login = $('#login');
  let btn_registro = $('#registro');
  
  let login_form = $('#form_login');
  let login_form_email = $('#email');
  let login_form_pass = $('#password');
  let login_form_recordar = $('#recordar');
  
  let registrarse_form = $('#form_registrarse');
  let registrarse_form_email = $('#email_registrarse');
  let registrarse_form_username = $('#username_registrarse');
  let registrarse_form_dni = $('#dni_registrarse');
  let registrarse_form_pass = $('#password_registrarse');

  let btn_logearse = $('#loguearse');
  let btn_registrarse = $('#registrarse');
  setLoginValues();
  
  btn_login.click(function(){
    cambiarFoco('login');
  });
  btn_registro.click(function(){
    cambiarFoco('registrarse');
  });
  btn_logearse.click(function () {
    login();
  });
  btn_registrarse.click(function () {
    registrarse();
  });

  function cambiarFoco(foco) {
    if(foco == 'registrarse') {
      btn_login.removeClass('btn-primary');
      btn_login.addClass('btn-outline-primary');
      btn_registro.addClass('btn-primary');
      btn_registro.removeClass('btn-outline-primary');
      login_form.addClass('ocultar');
      registrarse_form.removeClass('ocultar');
    } else if(foco == 'login') {
      btn_login.addClass('btn-primary');
      btn_login.removeClass('btn-outline-primary');
      btn_registro.removeClass('btn-primary');
      btn_registro.addClass('btn-outline-primary');
      login_form.removeClass('ocultar');
      registrarse_form.addClass('ocultar');
    }

  }

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
        url: 'src/login.php',
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

  function registrarse() {
    let datos = {
      'email': registrarse_form_email.val(),
      'user': registrarse_form_username.val(),
      'dni': registrarse_form_dni.val(),
      'pass': registrarse_form_pass.val()
    };
    $.ajax(
      {
        url: 'src/registro.php',
        type: 'POST',
        data: datos
      }
    ). done (function(data){
      console.log(data);
      if(data == 1) {
        alert('Todo correcto');
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