function hcPctPointHesapla() {
    const p1 = parseFloat(document.getElementById('hc-pp-p1').value);
    const p2 = parseFloat(document.getElementById('hc-pp-p2').value);

    if (isNaN(p1) || isNaN(p2)) {
        alert('Lütfen değerleri giriniz.');
        return;
    }

    const diff = p2 - p1;

    document.getElementById('hc-pp-res-val').innerText = `${diff.toLocaleString('tr-TR', { maximumFractionDigits: 2 })} Puan`;
    document.getElementById('hc-yuzde-puan-result').classList.add('visible');
}
