function hcHowDecHesapla() {
    const v1 = parseFloat(document.getElementById('hc-hd-v1').value);
    const v2 = parseFloat(document.getElementById('hc-hd-v2').value);

    if (isNaN(v1) || isNaN(v2) || v1 === 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    if (v2 > v1) {
        alert('Yeni değer eski değerden büyük. Lütfen Yüzde Artış aracını kullanın.');
        return;
    }

    const res = ((v1 - v2) / v1) * 100;

    document.getElementById('hc-hd-res-val').innerText = `% ${res.toLocaleString('tr-TR', { maximumFractionDigits: 2 })}`;
    document.getElementById('hc-yuzde-how-dec-result').classList.add('visible');
}
