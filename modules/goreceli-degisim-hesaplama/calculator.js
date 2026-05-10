function hcRelChangeHesapla() {
    const v1 = parseFloat(document.getElementById('hc-rc-v1').value);
    const v2 = parseFloat(document.getElementById('hc-rc-v2').value);

    if (!v1) {
        alert('Başlangıç değeri sıfır olamaz.');
        return;
    }

    const change = ((v2 - v1) / Math.abs(v1)) * 100;

    document.getElementById('hc-rc-res-val').innerText = `% ${change.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
    document.getElementById('hc-rel-change-result').classList.add('visible');
}
