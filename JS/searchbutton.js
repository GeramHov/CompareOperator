// SHOW INPUT AREA TO SEARCH DESTINATIONS

const searchInputShowBtn = document.querySelector('#loop');
const searchInput = document.querySelector('.searchinput')
const searchSubmitBtn = document.querySelector('.searchinputbtn')
const destinations = document.querySelector('.destinations')

const homeSection = document.querySelector('#home')


searchInputShowBtn.addEventListener('click', function (event) {

    event.preventDefault();

    searchInputShowBtn.style.display = 'none';
    destinations.style.display = 'none';

    searchInput.style.display = 'block';
    searchSubmitBtn.style.display = 'block';
})
