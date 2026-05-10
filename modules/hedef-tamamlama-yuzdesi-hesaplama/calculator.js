function hcTargetCompHesapla() {
    const target = parseFloat(document.getElementById('hc-tc-target').value);
    const actual = parseFloat(document.getElementById('hc-tc-actual').value);

    if (!target) {
        alert('Hedef sıfır olamaz.');
        return;
    }

    const percentage = (actual / target) * 100;

    document.getElementById('hc-tc-res-val').innerText = `% ${percentage.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
    document.getElementById('hc-target-comp-result').classList.add('visible');
}
