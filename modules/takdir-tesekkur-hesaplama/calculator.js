function hcCertHesapla() {
    const avg = parseFloat(document.getElementById('hc-c-avg').value);
    const hasFail = document.getElementById('hc-c-fail').value === 'yes';

    if (isNaN(avg) || avg < 0 || avg > 100) {
        alert('Lütfen 0-100 arası bir ortalama giriniz.');
        return;
    }

    let status = 'Belge Alınamaz';
    let color = '#e74c3c';
    
    if (hasFail) {
        status = 'Belge Alınamaz (Zayıf ders var)';
    } else if (avg >= 85) {
        status = 'TAKDİR BELGESİ';
        color = '#27ae60';
    } else if (avg >= 70) {
        status = 'TEŞEKKÜR BELGESİ';
        color = '#2980b9';
    } else {
        status = 'Belge Alınamaz (Ortalama yetersiz)';
    }

    const resEl = document.getElementById('hc-c-res-val');
    resEl.innerText = status;
    resEl.style.color = color;
    resEl.style.fontSize = '1.4rem';

    document.getElementById('hc-takdir-tesekkur-result').classList.add('visible');
}
