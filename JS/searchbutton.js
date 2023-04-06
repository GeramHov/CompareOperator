// SHOW INPUT AREA TO SEARCH DESTINATIONS

const searchInputShowBtn = document.querySelector('#loop');
const searchInput = document.querySelector('.searchinput')
const searchSubmitBtn = document.querySelector('.searchinputbtn')
const destinations = document.querySelector('.destinations')
const closeUp = document.querySelector('.closeup');


searchInputShowBtn.addEventListener('click', function(event){

    event.preventDefault();

    searchInputShowBtn.style.display = 'none';
    destinations.style.display = 'none';

    searchInput.style.display = 'block';
    searchSubmitBtn.style.display = 'block';
    closeUp.style.display = 'block';
})

closeUp.addEventListener('click', function(){

    searchInputShowBtn.style.display = 'block';
    destinations.style.display = 'block';

    searchInput.style.display = 'none';
    searchSubmitBtn.style.display = 'none';
    closeUp.style.display = 'none';
})

// SHOW INPUT AREA TO SEARCH COMPANIES

const compSearchInputShowBtn = document.querySelector('#loopcomp');
const compSearchInput = document.querySelector('.searchinputcomp')
const compSearchSubmitBtn = document.querySelector('.searchinputcompbtn')
const partners = document.querySelector('.partners')
const compcloseUp = document.querySelector('.closeupcomp');


loopcomp.addEventListener('click', function(event){

    event.preventDefault();

    compSearchInputShowBtn.style.display = 'none';
    partners.style.display = 'none';

    compSearchInput.style.display = 'block';
    compSearchSubmitBtn.style.display = 'block';
    compcloseUp.style.display = 'block';
})

compcloseUp.addEventListener('click', function(){

    compSearchInputShowBtn.style.display = 'block';
    partners.style.display = 'block';

    compSearchInput.style.display = 'none';
    compSearchSubmitBtn.style.display = 'none';
    compcloseUp.style.display = 'none';
})


