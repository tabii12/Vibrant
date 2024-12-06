const PRODUCTS_PER_PAGE = 12;

const productCards = document.querySelectorAll('.product-card');
const pagination = document.querySelector('.pagination');

const totalPages = Math.ceil(productCards.length / PRODUCTS_PER_PAGE);

let currentPage = 1;

function displayPage(page) {
    const startIndex = (page - 1) * PRODUCTS_PER_PAGE;
    const endIndex = startIndex + PRODUCTS_PER_PAGE;

    productCards.forEach((card, index) => {
        if (index >= startIndex && index < endIndex) {
            card.style.display = 'block'; 
        } else {
            card.style.display = 'none';
        }
    });
    setupPagination();
}
function setupPagination() {
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
        var productsGrid = document.getElementById('productsGrid');
        var products = Array.from(productsGrid.getElementsByClassName('product-card'));
        var sortBy = this.value;

        products.sort(function(a, b) {
            if (sortBy === 'lowToHigh') {
                return parseInt(a.getAttribute('data-price')) - parseInt(b.getAttribute('data-price'));
            }
            if (sortBy === 'highToLow') {
                return parseInt(b.getAttribute('data-price')) - parseInt(a.getAttribute('data-price'));
            }
          
            return 0; 
        });
        products.forEach(function(product) {
            productsGrid.appendChild(product);
        });
    });

