
// Số sản phẩm trên mỗi trang
const PRODUCTS_PER_PAGE = 12;

// Lấy các sản phẩm và container
const productCards = document.querySelectorAll('.product-card');
const pagination = document.querySelector('.pagination');

// Tính tổng số trang
const totalPages = Math.ceil(productCards.length / PRODUCTS_PER_PAGE);

// Hiển thị sản phẩm dựa trên trang hiện tại
function displayPage(page) {
    // Tính toán chỉ số bắt đầu và kết thúc
    const startIndex = (page - 1) * PRODUCTS_PER_PAGE;
    const endIndex = startIndex + PRODUCTS_PER_PAGE;

    // Ẩn tất cả sản phẩm
    productCards.forEach((card, index) => {
        if (index >= startIndex && index < endIndex) {
            card.style.display = 'block'; // Hiển thị sản phẩm thuộc trang hiện tại
        } else {
            card.style.display = 'none'; // Ẩn các sản phẩm không thuộc trang hiện tại
        }
    });
}

// Tạo nút phân trang
function setupPagination() {
    // Xóa nội dung cũ của phân trang
    pagination.innerHTML = '';

    // Xác định phạm vi trang cần hiển thị
    let startPage = Math.max(1, currentPage - 1); // Hiển thị trang hiện tại và 1 trang trước
    let endPage = Math.min(totalPages, currentPage + 2); // Hiển thị trang hiện tại và 2 trang sau

    // Nếu có đủ trang, hiển thị dấu ba chấm
    if (startPage > 1) {
        const dots = document.createElement('div');
        dots.className = 'dots';
        dots.textContent = '...';
        pagination.appendChild(dots);
    }

    // Thêm các nút trang trong phạm vi
    for (let i = startPage; i <= endPage; i++) {
        const pageItem = document.createElement('div');
        pageItem.className = 'page-item';
        pageItem.textContent = i;

        // Gắn sự kiện click để chuyển trang
        pageItem.addEventListener('click', () => {
            currentPage = i; // Cập nhật trang hiện tại
            document.querySelectorAll('.page-item').forEach(item => item.classList.remove('active'));
            pageItem.classList.add('active');
            displayPage(currentPage); // Hiển thị sản phẩm của trang được chọn
            setupPagination(); // Cập nhật phân trang
        });

        // Đặt trang đầu tiên là active
        if (i === currentPage) {
            pageItem.classList.add('active');
        }

        pagination.appendChild(pageItem);
    }

    // Nếu có đủ trang, hiển thị dấu ba chấm ở cuối
    if (endPage < totalPages) {
        const dots = document.createElement('div');
        dots.className = 'dots';
        dots.textContent = '...';
        pagination.appendChild(dots);
    }

    // Hiển thị nút "Next" nếu cần
    if (currentPage < totalPages) {
        const nextPage = document.createElement('div');
        nextPage.className = 'page-item';
        nextPage.textContent = 'Next';
        nextPage.addEventListener('click', () => {
            currentPage++;
            displayPage(currentPage);
            setupPagination();
        });
        pagination.appendChild(nextPage);
    }

    // Hiển thị nút "Prev" nếu cần
    if (currentPage > 1) {
        const prevPage = document.createElement('div');
        prevPage.className = 'page-item';
        prevPage.textContent = 'Prev';
        prevPage.addEventListener('click', () => {
            currentPage--;
            displayPage(currentPage);
            setupPagination();
        });
        pagination.prepend(prevPage);
    }
}

// Khởi tạo
let currentPage = 1; // Trang mặc định là trang đầu tiên
displayPage(currentPage); // Hiển thị sản phẩm trang đầu tiên
setupPagination(); // Tạo các nút phân trang

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
            if (sortBy === 'newest') {
                return new Date(b.getAttribute('data-date')) - new Date(a.getAttribute('data-date'));
            }
            return 0; // Default (no sort)
        });

        // Reattach sorted products to the grid
        products.forEach(function(product) {
            productsGrid.appendChild(product);
        });
    });

