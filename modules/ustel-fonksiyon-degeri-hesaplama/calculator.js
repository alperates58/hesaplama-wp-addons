function hcExpFuncHesapla() {
    let aStr = document.getElementById('hc-ef-a').value.trim().toLowerCase();
    const x = parseFloat(document.getElementById('hc-ef-x').value);

    if (isNaN(x)) {
        alert('Lütfen geçerli bir üs değeri giriniz.');
        return;
    }

    let a;
    if (aStr === 'e') {
        a = Math.E;
    } else {
        a = parseFloat(aStr);
        if (isNaN(a)) { alert('Lütfen geçerli bir taban giriniz.'); return; }
    }

    const res = Math.pow(a, x);

    document.getElementById('hc-ef-res-val').innerText = isFinite(res) ? res.toLocaleString('tr-TR', { maximumFractionDigits: 8 }) : 'Sayı Çok Büyük';
    document.getElementById('hc-ustel-fonksiyon-result').classList.add('visible');
}
