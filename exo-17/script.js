document.addEventListener('DOMContentLoaded', () => {
  const catalogInput = document.getElementById('catalog');
  const idInput      = document.getElementById('id');
  const sendButton   = document.getElementById('send');
  const resultCode   = document.getElementById('result');
  sendButton.addEventListener('click', event => {
    event.preventDefault();
    resultCode.textContent = 'Chargement...';
    const uri = catalogInput.value + '/' + idInput.value;
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (this.readyState === XMLHttpRequest.DONE){
        if (this.status === 200){
          const data           = JSON.parse(this.responseText);
          const formatter      = new JSONFormatter(data);
          resultCode.innerHTML = '';
          resultCode.appendChild(formatter.render());
        }
        else {
          resultCode.textContent = 'Erreur de chargement'
        }
      }
    };
    xhr.open('GET', 'https://www.anapioficeandfire.com/api/' + uri);
    xhr.setRequestHeader('Accept', 'application/json');
    xhr.send();
  });
});
