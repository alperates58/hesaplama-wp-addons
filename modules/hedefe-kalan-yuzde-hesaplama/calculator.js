function hcTargetRemHesapla() {
    const target = parseFloat(document.getElementById('hc-tr-target').value);
    const actual = parseFloat(document.getElementById('hc-tr-actual').value);

    if (!target) {
        alert('Hedef sıfır olamaz.');
        return;
    }

    const remaining = target - actual;
    const percentage = (remaining / target) * 100;

    document.getElementById('hc-tr-res-val').innerText = `% ${percentage.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
    document.getElementById('hc-target-rem-result').classList.add('visible');
}
