// ================= DASHBOARD CUSTOM JAVASCRIPT =================

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
            return ['#DBEAFE', '#DCFCE7', '#F3E8FF', '#FFEDD5', '#FCE7F3', '#CCFBF1', '#E0E7FF', '#FEE2E2'][index] || '#F3F4F6'; 
        },
        
        getFooterBgColor(index) { 
            return ['#BFDBFE', '#BBF7D0', '#E9D5FF', '#FED7AA', '#FBCFE8', '#99F6E4', '#C7D2FE', '#FECACA'][index] || '#E5E7EB'; 
        },
        
        goToSlide(index) { 
            this.currentIndex = index; 
            this.resetAutoSlide(); 
        }
    };
}

// Register Alpine component jika diperlukan
if (typeof Alpine !== 'undefined') {
    Alpine.data('tipsSlider', tipsSlider);
}