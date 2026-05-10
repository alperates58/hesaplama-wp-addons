function hcHowIncHesapla() {
    const v1 = parseFloat(document.getElementById('hc-hi-v1').value);
    const v2 = parseFloat(document.getElementById('hc-hi-v2').value);

    if (isNaN(v1) || isNaN(v2) || v1 === 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    if (v2 < v1) {
        alert('Yeni değer eski değerden küçük. Lütfen Yüzde Azalış aracını kullanın.');
        return;
    }

    const res = ((v2 - v1) / v1) * 100;

    document.getElementById('hc-hi-res-val').innerText = `% ${res.toLocaleString('tr-TR', { maximumFractionDigits: 2 })}`;
    document.getElementById('hc-yuzde-how-inc-result').classList.add('visible');
}
