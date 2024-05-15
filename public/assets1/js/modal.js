document.addEventListener('DOMContentLoaded', function() {
    var body = document.body;
    var openModalBtns = document.querySelectorAll('.openModalBtn');
    var modalOpen = false;

    // Gắn sự kiện click cho mỗi nút "Xem Trailer"
    openModalBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var modal = btn.nextElementSibling;
            var videoUrl = btn.dataset.videoUrl;
            var html = ' <div class="modal-content">' +
                '<div class="close"><span>&times;</span></div>' +
                '<video id="videoPlayer" controls>' +
                '<source src="' + videoUrl + '" type="video/mp4">' +
                '</video>' +
                '</div>';
            modal.innerHTML = html;
            modal.style.display = "flex";
            body.style.overflow = 'hidden';
            modalOpen = true;

            // Ngưng chạy slide của tất cả các carousel khi modal được mở
            pauseAllCarousels();
        });
    });

    // Gắn sự kiện click cho toàn bộ window để đóng modal khi click ra ngoài
    window.addEventListener('click', function(event) {
        var modals = document.querySelectorAll('.modal');
        modals.forEach(function(modal) {
            if (event.target == modal) {
                closeModal(modal);
            }
        });
    });

    // Gắn sự kiện click cho nút đóng modal
    document.addEventListener('click', function(event) {
        var closeBtns = document.querySelectorAll('.close');
        closeBtns.forEach(function(closeBtn) {
            if (event.target == closeBtn || event.target.parentElement == closeBtn) {
                var modal = closeBtn.parentElement.parentElement;
                closeModal(modal);
            }
        });
    });

    // Hàm đóng modal
    function closeModal(modal) {
        var video = modal.querySelector('video');
        if (!video.paused) {
            video.pause();
        }
        modal.style.display = "none";
        modal.innerHTML = '';
        body.style.overflow = 'auto';
        modalOpen = false;

        // Tiếp tục chạy slide của tất cả các carousel khi modal được đóng
        if (!modalOpen) {
            resumeAllCarousels();
        }
    }

    // Hàm ngừng chạy slide của tất cả các carousel
    function pauseAllCarousels() {
        var carousels = document.querySelectorAll('.carousel');
        carousels.forEach(function(carousel) {
            var carouse = new bootstrap.Carousel(carousel, {
                pause: 'hover'
                
              })
        });
    }

    // Hàm tiếp tục chạy slide của tất cả các carousel
    function resumeAllCarousels() {
        var carousels = document.querySelectorAll('.carousel');
        carousels.forEach(function(carousel) {
            var carouselInstance = new bootstrap.Carousel(carousel);
            carouselInstance.cycle();
        });
    }
});
