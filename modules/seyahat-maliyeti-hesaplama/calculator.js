function hcGuncelleYakitFiyati() {
    const selector = document.getElementById('hc-yakit-tipi');
    const customGroup = document.getElementById('hc-custom-price-group');
    if (selector.value === 'custom') {
        customGroup.style.display = 'block';
    } else {
        customGroup.style.display = 'none';
    }
}

function hcSeyahatHesapla() {
    const mesafe = parseFloat(document.getElementById('hc-mesafe').value);
    const tuketim = parseFloat(document.getElementById('hc-tuketim').value);
    const kisi = parseInt(document.getElementById('hc-kisi').value) || 1;
    const ekMasraf = parseFloat(document.getElementById('hc-ek-masraf').value) || 0;
    
    let yakitFiyati;
    const selector = document.getElementById('hc-yakit-tipi');
    if (selector.value === 'custom') {
        yakitFiyati = parseFloat(document.getElementById('hc-yakit-fiyat').value);
    } else {
        yakitFiyati = parseFloat(selector.value);
    }

    if (isNaN(mesafe) || isNaN(tuketim) || isNaN(yakitFiyati) || mesafe <= 0 || tuketim <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // Hesaplamalar
    const toplamLitre = (mesafe / 100) * tuketim;
    const yakitTutari = toplamLitre * yakitFiyati;
    const toplamMaliyet = yakitTutari + ekMasraf;
    const kisiBasi = toplamMaliyet / kisi;

    // Sonuçları Yazdır
    document.getElementById('hc-res-total').innerText = toplamMaliyet.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-per-person').innerText = kisiBasi.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-fuel').innerText = yakitTutari.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-liters').innerText = toplamLitre.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' L';

    // Görünür yap
    const resultDiv = document.getElementById('hc-seyahat-result');
    resultDiv.classList.add('visible');
    resultDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
