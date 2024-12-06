const ppp = 12;

const productCards = document.querySelectorAll('.product-card');
const pagination = document.querySelector('.pagination');

const totalPages = Math.ceil(productCards.length / ppp);

let currentPage = 1;

function displayPage(page) {
    const startIndex = (page - 1) * ppp;
    const endIndex = startIndex + ppp;

    productCards.forEach((card, index) => {
        if (index >= startIndex && index < endIndex) {
            card.style.display = 'block'; 
        } else {
            card.style.display = 'none';
        }
    });
    phantrang();
}
function phantrang() {
    pagination.innerHTML = '';


    if (currentPage > 1) {
        const prevPage = document.createElement('div');
        prevPage.className = 'page-item';
        prevPage.textContent = '<';
        prevPage.addEventListener('click', () => {
            currentPage--;
            displayPage(currentPage);
        });
        pagination.appendChild(prevPage);
    }
    if (currentPage < totalPages) {
        const nextPage = document.createElement('div');
        nextPage.className = 'page-item';
        nextPage.textContent = '>';
        nextPage.addEventListener('click', () => {
            currentPage++;
            displayPage(currentPage);
        });
        pagination.appendChild(nextPage);
    }
}


displayPage(currentPage);


document.getElementById('sortSelect').addEventListener('change', function() {
    const products = Array.from(document.getElementsByClassName('product-card'));
    const sortBy = this.value;

    products.sort((a, b) => {
        const priceA = parseInt(a.getAttribute('data-price'));
        const priceB = parseInt(b.getAttribute('data-price'));
        return sortBy === 'lowToHigh' ? priceA - priceB : priceB - priceA;
    });

    products.forEach(product => document.getElementById('productsGrid').appendChild(product));
});


