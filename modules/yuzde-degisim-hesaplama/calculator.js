function hcPctChangeHesapla() {
    const v1 = parseFloat(document.getElementById('hc-pc-v1').value);
    const v2 = parseFloat(document.getElementById('hc-pc-v2').value);

    if (isNaN(v1) || isNaN(v2) || v1 === 0) {
        alert('Lütfen geçerli değerler giriniz (Eski değer 0 olamaz).');
        return;
    }

    const change = ((v2 - v1) / v1) * 100;
    const sign = change > 0 ? '+' : '';

    document.getElementById('hc-pc-res-val').innerText = `% ${sign}${change.toLocaleString('tr-TR', { maximumFractionDigits: 2 })}`;
    document.getElementById('hc-yuzde-degisim-result').classList.add('visible');
}
