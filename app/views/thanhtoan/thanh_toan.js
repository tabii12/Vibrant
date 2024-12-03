
    document.addEventListener('DOMContentLoaded', function() {
     const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
const mobileMenu = document.querySelector('.mobile-menu');
     const menuIcon = mobileMenuBtn.querySelector('i');
 
     // Toggle menu
     mobileMenuBtn.addEventListener('click', function(e) {
         e.stopPropagation(); // Ngăn sự kiện click lan ra document
         mobileMenu.classList.toggle('active');
         
         // Toggle icon
         if (mobileMenu.classList.contains('active')) {
             menuIcon.classList.remove('fa-bars');
             menuIcon.classList.add('fa-times');
         } else {
             menuIcon.classList.remove('fa-times');
             menuIcon.classList.add('fa-bars');
         }
     });
 
     // Đóng menu khi click bên ngoài
     document.addEventListener('click', function(e) {
         if (!mobileMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
             mobileMenu.classList.remove('active');
             menuIcon.classList.remove('fa-times');
             menuIcon.classList.add('fa-bars');
         }
     });
 
     // Ngăn sự kiện click trong menu lan ra document
     mobileMenu.addEventListener('click', function(e) {
         e.stopPropagation();
     });
 
     // Đóng menu khi click vào links
     const mobileMenuLinks = mobileMenu.querySelectorAll('a');
     mobileMenuLinks.forEach(link => {
         link.addEventListener('click', () => {
             mobileMenu.classList.remove('active');
             menuIcon.classList.remove('fa-times');
             menuIcon.classList.add('fa-bars');
         });
     });
 });
 window.onscroll = function() {
        let scrollTopBtn = document.getElementById("scrollTopBtn");
        if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
            scrollTopBtn.style.display = "block";
        } else {
            scrollTopBtn.style.display = "none";
        }
    };

    // Hàm cuộn lên đầu trang
    function scrollToTop() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    //Hiện thông báo thành công
    document.addEventListener('DOMContentLoaded', function () {
    const confirmButton = document.querySelector('.confirm');
    
    confirmButton.addEventListener('click', function () {
        const selectedMethod = document.querySelector('select').value;
        const firstName = document.querySelector('input[name="first_name"]').value;
        const lastName = document.querySelector('input[name="last_name"]').value;
        const ct = document.querySelector('input[name="city"]').value;
        const dt = document.querySelector('input[name="district"]').value;
        const Ward = document.querySelector('input[name="ward"]').value;
        const pl = document.querySelector('input[name="postal_code"]').value;
        const home = document.querySelector('input[name="country"]').value;
        if (!firstName || !lastName || !ct || !dt || !Ward || !pl || !home) {
            alert("Vui lòng nhập đầy đủ thông tin cá nhân.");
            return;
        }

        alert(`Thanh toán thành công! Phương thức: ${selectedMethod}`);
    });
});



