        // let khuyenMaiList = []
        // console.log(khuyenMaiList);
        // const showKhuyenMai = () => {
        //     const tableBody = document.querySelector("#khuyenMaiTable");
        //     tableBody.innerHTML = "";
        
        //     khuyenMaiList.forEach((item, index) => {
        //     const row = document.createElement("tr");
        //         console.log(item.id);
        //     row.innerHTML = `
        //         <td>${item.id}</td>
        //         <td class="code">${item.ma_nhap}</td>
        //         <td>${item.phan_tram_giam}%</td>
        //         <td>${item.ngay_bat_dau}</td>
        //         <td>${item.ngay_ket_thuc}</td>
        //         <td>
        //           <button onclick="delKhuyenMai(${item.id})"><i class="fa-solid fa-trash-can"></i></button>
        //         </td>
        //     `;
        
        //     tableBody.appendChild(row);
        //     });
        // };
        
        // const delKhuyenMai = (id) => {
        //     const index = khuyenMaiList.findIndex((km) => km.id === id);
        
        //     if (index !== -1) {
        //     khuyenMaiList.splice(index, 1);
        //     alert('Khuyến mãi đã được xóa')
        //     console.log(`Khuyến mãi với ID ${id} đã được xóa.`);
        //     } else {
        //     console.log(`Không tìm thấy khuyến mãi với ID ${id}.`);
        //     }
        //     showKhuyenMai();
        // };
        
        // showKhuyenMai();


        const addKhuyenMai = document.querySelector("#addKhuyenMai");
        const closeKhuyenMai = document.querySelector("#cancelBtn");
        const popupForm = document.querySelector("#popupForm");
        // const promoForm = document.querySelector("#promoForm");

        addKhuyenMai.addEventListener("click", () => {
            popupForm.style.display = "block";
        })

        closeKhuyenMai.addEventListener("click", () => {
            popupForm.style.display = "none";
        })

        const closeForm = () => {
            popupForm.style.display = "none";
        }

        // promoForm.addEventListener("submit", (event) => {
        //     event.preventDefault();

        //     const promoCode = document.querySelector("#promoCode").value;
        //     const discount = document.querySelector("#discount").value;
        //     const startDate = document.querySelector("#startDate").value;
        //     const endDate = document.querySelector("#endDate").value;

        //     const newPromo = {
        //         id: khuyenMaiList.length + 1,
        //         ma: promoCode,
        //         phanTramGiam: discount,
        //         ngayBatDau: startDate,
        //         ngayKetThuc: endDate
        //     };

        //     khuyenMaiList.push(newPromo);

        //     alert("Khuyến mãi đã được thêm thành công!");
        //     closeForm();
        //     promoForm.reset();
        //     showKhuyenMai();
        // })