function hcSigaraHesapla() {
    const adet = parseInt(document.getElementById('hc-sigara-adet').value);
    const fiyat = parseFloat(document.getElementById('hc-paket-fiyat').value);
    const birakmaTarihiStr = document.getElementById('hc-birakma-tarihi').value;

    if (isNaN(adet) || isNaN(fiyat) || adet <= 0 || fiyat <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // Finansal Hesaplamalar
    const gunlukMaliyet = (adet / 20) * fiyat;
    const haftalik = gunlukMaliyet * 7;
    const aylik = gunlukMaliyet * 30.44;
    const yillik = gunlukMaliyet * 365;
    const onYillik = yillik * 10;

    document.getElementById('hc-res-hafta').innerText = haftalik.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' ₺';
    document.getElementById('hc-res-ay').innerText = aylik.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' ₺';
    document.getElementById('hc-res-yil').innerText = yillik.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' ₺';
    document.getElementById('hc-res-10yil').innerText = onYillik.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' ₺';

    // Zaman Hesaplaması (Her sigara ortalama 5 dakika)
    const yillikDakika = adet * 5 * 365;
    const gun = Math.floor(yillikDakika / (24 * 60));
    const saat = Math.floor((yillikDakika % (24 * 60)) / 60);
    document.getElementById('hc-res-zaman').innerText = `${gun} gün, ${saat} saat`;

    // Sağlık Takvimi
    const milestones = [
        { time: 20 / (24 * 60), label: '20 Dakika', desc: 'Nabız ve kan basıncı normale döner.' },
        { time: 12 / 24, label: '12 Saat', desc: 'Kandaki karbonmonoksit seviyesi normale düşer.' },
        { time: 1, label: '24 Saat', desc: 'Kalp krizi riski azalmaya başlar.' },
        { time: 2, label: '48 Saat', desc: 'Tat ve koku alma duyuları iyileşir.' },
        { time: 14, label: '2 Hafta', desc: 'Dolaşım düzelir, akciğer fonksiyonları artar.' },
        { time: 30, label: '1 Ay', desc: 'Öksürük ve nefes darlığı azalır.' },
        { time: 365, label: '1 Yıl', desc: 'Koroner kalp hastalığı riski yarıya iner.' },
        { time: 365 * 5, label: '5 Yıl', desc: 'İnme riski sigara içmeyenler seviyesine geriler.' },
        { time: 365 * 10, label: '10 Yıl', desc: 'Akciğer kanseri riski yarıya iner.' }
    ];

    const timelineContainer = document.getElementById('hc-health-timeline');
    timelineContainer.innerHTML = '';

    let timePassed = 0;
    if (birakmaTarihiStr) {
        const birakmaTarihi = new Date(birakmaTarihiStr);
        const simdi = new Date();
        timePassed = (simdi - birakmaTarihi) / (1000 * 60 * 60 * 24);
    }

    milestones.forEach(m => {
        const isCompleted = timePassed >= m.time;
        const item = document.createElement('div');
        item.className = `hc-timeline-item ${isCompleted ? 'completed' : ''}`;
        item.innerHTML = `
            <div class="hc-timeline-badge"></div>
            <div class="hc-timeline-content">
                <strong>${m.label}</strong>
                <p>${m.desc}</p>
            </div>
        `;
        timelineContainer.appendChild(item);
    });

    // Görünür yap
    const resultDiv = document.getElementById('hc-sigara-result');
    resultDiv.classList.add('visible');
    resultDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
