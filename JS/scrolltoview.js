document.addEventListener('DOMContentLoaded', function() {
  const link = document.querySelector('#partnersbtn');
  link.addEventListener('click', function() {
    const target = document.querySelector('#partners');
    target.scrollIntoView({ behavior: 'smooth' });
  });
});
