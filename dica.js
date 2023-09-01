const btnDica = document.getElementById('btn-dica');
const dicaContent = document.getElementById('dica-content');
const dicaText = document.getElementById('dica-text');

btnDica.addEventListener('click', function() {
  if (dicaContent.style.display === 'none') {
    dicaContent.style.display = 'block';
  } else {
    dicaContent.style.display = 'none';
  }
});
