 // пример подгрузки ошибок из PHP
    fetch('init.php')
      .then(r => r.text())
      .then(data => {
        document.getElementById('login-error').innerHTML = data;
      });
