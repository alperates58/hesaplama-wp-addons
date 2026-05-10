function hcExpValHesapla() {
    const a = parseFloat(document.getElementById('hc-ev-a').value);
    const b = parseFloat(document.getElementById('hc-ev-b').value);

    if (isNaN(a) || isNaN(b)) {
        alert('Lütfen değerleri giriniz.');
        return;
    }

    const res = Math.pow(a, b);
    
    document.getElementById('hc-ev-res-val').innerText = isFinite(res) ? res.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) : 'Sayı Çok Büyük';
    document.getElementById('hc-uslu-sayi-val-result').classList.add('visible');
}
