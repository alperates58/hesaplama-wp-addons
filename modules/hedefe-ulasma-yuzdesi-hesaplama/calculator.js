function hcTargetReachHesapla() {
    const target = parseFloat(document.getElementById('hc-tu-target').value);
    const actual = parseFloat(document.getElementById('hc-tu-actual').value);

    if (!target) {
        alert('Hedef sıfır olamaz.');
        return;
    }

    const percentage = (actual / target) * 100;

    document.getElementById('hc-tu-res-val').innerText = `% ${percentage.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
    document.getElementById('hc-target-reach-result').classList.add('visible');
}
