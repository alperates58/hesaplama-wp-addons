function hcPowHesapla() {
    const a = parseFloat(document.getElementById('hc-p-base').value);
    const b = parseFloat(document.getElementById('hc-p-exp').value);

    if (isNaN(a) || isNaN(b)) {
        alert('Lütfen geçerli sayılar giriniz.');
        return;
    }

    const res = Math.pow(a, b);

    if (!isFinite(res)) {
        document.getElementById('hc-p-res-val').innerText = 'Sayı Çok Büyük (Sonsuz)';
    } else {
        document.getElementById('hc-p-res-val').innerText = res.toLocaleString('tr-TR', { maximumFractionDigits: 6 });
    }
    
    document.getElementById('hc-us-result').classList.add('visible');
}
