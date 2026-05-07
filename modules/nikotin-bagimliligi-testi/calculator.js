function hcNikotinHesapla() {
    const questions = document.querySelectorAll('.hc-nbt-q');
    let toplamPuan = 0;

    questions.forEach(q => {
        toplamPuan += parseInt(q.value);
    });

    document.getElementById('hc-nbt-res-puan').innerText = toplamPuan;
    
    const yorumBox = document.getElementById('hc-nbt-res-yorum');
    let metin = '';
    let bg = '';
    let renk = '';

    if (toplamPuan <= 3) {
        metin = '<strong>DÜŞÜK BAĞIMLILIK.</strong><br>Nikotin bağımlılığınız düşük düzeydedir. Sigarayı bırakmak sizin için fiziksel olarak daha kolay olabilir.';
        bg = 'rgba(15, 138, 95, 0.1)';
        renk = 'var(--hc-front-green)';
    } else if (toplamPuan <= 6) {
        metin = '<strong>ORTA BAĞIMLILIK.</strong><br>Orta düzeyde nikotin bağımlılığınız bulunmaktadır. Sigarayı bırakırken profesyonel destek almanız başarı şansınızı artıracaktır.';
        bg = 'rgba(201, 137, 5, 0.1)';
        renk = 'var(--hc-front-gold)';
    } else {
        metin = '<strong>YÜKSEK BAĞIMLILIK!</strong><br>İleri derecede nikotin bağımlılığınız bulunmaktadır. Sigarayı bırakma sürecinde tıbbi destek ve davranış terapisi almanız önerilir.';
        bg = 'rgba(192, 54, 44, 0.1)';
        renk = 'var(--hc-front-red)';
    }

    yorumBox.innerHTML = metin;
    yorumBox.style.background = bg;
    yorumBox.style.color = renk;

    document.getElementById('hc-nikotin-bagimliligi-testi-result').classList.add('visible');
}
