// ================= DASHBOARD CUSTOM JAVASCRIPT =================

// Tips Slider Component
function tipsSlider() {
    return {
        tips: [
            { icon: '📝', title: 'Deskripsi yang Detail', content: 'Jelaskan masalah secara detail agar admin bisa memahami dan menindaklanjuti dengan cepat.' },
            { icon: '📸', title: 'Sertakan Foto', content: 'Lampirkan foto bukti untuk memperkuat pengaduan Anda. Foto yang jelas akan membantu tim teknis.' },
            { icon: '🏷️', title: 'Pilih Kategori Tepat', content: 'Pilih kategori yang sesuai agar pengaduan cepat diproses oleh bagian terkait.' },
            { icon: '👀', title: 'Follow Up', content: 'Pantau status pengaduan Anda secara berkala. Jika sudah 3 hari belum ada tanggapan, tanyakan melalui fitur komentar.' },
            { icon: '💬', title: 'Bahasa Santun', content: 'Sampaikan pengaduan dengan bahasa yang santun dan sopan. Komunikasi yang baik akan mempercepat penyelesaian masalah.' },
            { icon: '📍', title: 'Cantumkan Lokasi', content: 'Sertakan informasi lokasi yang jelas agar petugas bisa langsung menuju ke tempat kejadian.' },
            { icon: '🎯', title: 'Satu Pengaduan Satu Masalah', content: 'Pisahkan pengaduan yang berbeda agar lebih mudah diproses. Satu pengaduan untuk satu jenis masalah.' },
            { icon: '⏰', title: 'Laporkan Segera', content: 'Jangan menunda melaporkan masalah. Semakin cepat dilaporkan, semakin cepat pula ditangani.' }
        ],
        currentIndex: 0,
        intervalId: null,
        
        initSlider() {
            this.startAutoSlide();
        },
        
        next() {
            this.currentIndex = (this.currentIndex + 1) % this.tips.length;
            this.resetAutoSlide();
        },
        
        prev() {
            this.currentIndex = (this.currentIndex - 1 + this.tips.length) % this.tips.length;
            this.resetAutoSlide();
        },
        
        startAutoSlide() {
            this.intervalId = setInterval(() => { this.next(); }, 5000);
        },
        
        resetAutoSlide() {
            clearInterval(this.intervalId);
            this.startAutoSlide();
        },
        
        getBodyBgColor(index) {
            const colors = ['#DBEAFE', '#DCFCE7', '#F3E8FF', '#FFEDD5', '#FCE7F3', '#CCFBF1', '#E0E7FF', '#FEE2E2'];
            return colors[index] || '#F3F4F6';
        },
        
        getFooterBgColor(index) {
            const colors = ['#BFDBFE', '#BBF7D0', '#E9D5FF', '#FED7AA', '#FBCFE8', '#99F6E4', '#C7D2FE', '#FECACA'];
            return colors[index] || '#E5E7EB';
        },
        
        goToSlide(index) {
            this.currentIndex = index;
            this.resetAutoSlide();
        }
    };
}

// File Upload Component
function fileUpload() {
    return {
        filePreview: null,
        fileName: null,
        isDragging: false,
        
        init() {
            // Cek apakah ada file yang sudah diupload sebelumnya (untuk edit draft)
            const existingImage = document.querySelector('[data-existing-image]');
            if (existingImage && existingImage.dataset.existingImage) {
                this.fileName = existingImage.dataset.existingImage;
                this.filePreview = existingImage.dataset.existingImageUrl;
            }
        },
        
        handleFileSelect(event) {
            const file = event.target.files[0];
            this.processFile(file);
        },
        
        handleDrop(event) {
            const file = event.dataTransfer.files[0];
            this.processFile(file);
        },
        
        processFile(file) {
            if (!file) return;
            
            const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
            if (!validTypes.includes(file.type)) {
                alert('Hanya file gambar yang diperbolehkan (JPG, PNG, GIF)');
                return;
            }
            
            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran file maksimal 2MB');
                return;
            }
            
            this.fileName = file.name;
            
            const reader = new FileReader();
            reader.onload = (e) => {
                this.filePreview = e.target.result;
            };
            reader.readAsDataURL(file);
            
            const input = document.getElementById('image-upload');
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            input.files = dataTransfer.files;
            
            this.isDragging = false;
        },
        
        removeFile() {
            this.filePreview = null;
            this.fileName = null;
            const input = document.getElementById('image-upload');
            input.value = '';
            this.isDragging = false;
        }
    };
}

// Register Alpine components
if (typeof Alpine !== 'undefined') {
    Alpine.data('tipsSlider', tipsSlider);
    Alpine.data('fileUpload', fileUpload);
}