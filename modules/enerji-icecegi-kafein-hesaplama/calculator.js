function hcEnerjiKafeinHesapla() {
    const tip = document.getElementById('hc-eikh-tip').value;
    const ml = parseFloat(document.getElementById('hc-eikh-hacim').value);
    const adet = parseFloat(document.getElementById('hc-eikh-adet').value) || 0;

    let mgPer100 = 32;
    if (tip === 'standart') mgPer100 = 32;
    else if (tip === 'yuksek') mgPer100 = 45;
    else if (tip === 'ozel') {
        mgPer100 = parseFloat(document.getElementById('hc-eikh-mg').value);
    }

    if (isNaN(mgPer100)) {
        alert('Lütfen kafein oranını giriniz.');
        return;
    }

    const toplamMg = (mgPer100 * (ml / 100)) * adet;

    document.getElementById('hc-eikh-res-toplam').innerText = Math.round(toplamMg) + ' mg';
    
    const uyariBox = document.getElementById('hc-eikh-res-uyari');
    if (toplamMg > 400) {
        uyariBox.innerText = 'DİKKAT: Günlük güvenli kafein sınırı (400mg) aşıldı! Çarpıntı, uykusuzluk ve anksiyete görülebilir.';
        uyariBox.style.background = 'rgba(192, 54, 44, 0.1)';
        uyariBox.style.color = 'var(--hc-front-red)';
    } else if (toplamMg > 200) {
        uyariBox.innerText = 'Önemli: Tek seferde yüksek miktarda kafein alımı yapmaktasınız. Günün geri kalanında kafein alımını kısıtlamanız önerilir.';
        uyariBox.style.background = 'rgba(201, 137, 5, 0.1)';
        uyariBox.style.color = 'var(--hc-front-gold)';
    } else {
        uyariBox.innerText = 'Kafein miktarı güvenli sınırlar içerisindedir.';
        uyariBox.style.background = 'rgba(15, 138, 95, 0.1)';
        uyariBox.style.color = 'var(--hc-front-green)';
    }

    document.getElementById('hc-enerji-icecegi-kafein-hesaplama-result').classList.add('visible');
}
