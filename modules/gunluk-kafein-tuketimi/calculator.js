function hcKafeinHesapla() {
    const durum = document.getElementById('hc-gkt-durum').value;
    const inputs = document.querySelectorAll('.hc-gkt-input');
    let toplamKafein = 0;

    inputs.forEach(input => {
        const adet = parseFloat(input.value) || 0;
        const mg = parseFloat(input.dataset.mg);
        toplamKafein += adet * mg;
    });

    let limit = 400;
    if (durum === 'gebe') {
        limit = 200;
    } else if (durum === 'cocuk') {
        const kilo = parseFloat(document.getElementById('hc-gkt-kilo').value) || 0;
        limit = kilo * 3; // EFSA guideline: 3mg/kg for children
    }

    if (durum === 'cocuk' && !document.getElementById('hc-gkt-kilo').value) {
        alert('Lütfen kilonuzu giriniz.');
        return;
    }

    const kalan = Math.max(0, limit - toplamKafein);
    const yuzde = Math.min(100, (toplamKafein / limit) * 100);

    document.getElementById('hc-gkt-res-toplam').innerText = toplamKafein.toLocaleString('tr-TR') + ' mg';
    document.getElementById('hc-gkt-res-limit').innerText = limit.toLocaleString('tr-TR') + ' mg';
    document.getElementById('hc-gkt-res-kalan').innerText = kalan.toLocaleString('tr-TR') + ' mg';

    const progressBar = document.getElementById('hc-gkt-progress');
    const durumText = document.getElementById('hc-gkt-res-durum');

    progressBar.style.width = yuzde + '%';

    if (yuzde < 70) {
        progressBar.style.backgroundColor = 'var(--hc-front-green)';
        durumText.innerText = 'Güvenli Bölge';
        durumText.style.color = 'var(--hc-front-green)';
    } else if (yuzde < 100) {
        progressBar.style.backgroundColor = 'var(--hc-front-gold)';
        durumText.innerText = 'Sınıra Yakın';
        durumText.style.color = 'var(--hc-front-gold)';
    } else {
        progressBar.style.backgroundColor = 'var(--hc-front-red)';
        durumText.innerText = 'Limit Aşıldı!';
        durumText.style.color = 'var(--hc-front-red)';
    }

    document.getElementById('hc-gunluk-kafein-tuketimi-result').classList.add('visible');
}
