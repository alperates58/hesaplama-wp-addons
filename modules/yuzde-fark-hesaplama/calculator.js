function hcPctDiffHesapla() {
    const s1 = parseFloat(document.getElementById('hc-pd-s1').value);
    const s2 = parseFloat(document.getElementById('hc-pd-s2').value);

    if (isNaN(s1) || isNaN(s2) || (s1 + s2) === 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // Percentage Difference = |V1 - V2| / ((V1 + V2) / 2) * 100
    const diff = Math.abs(s1 - s2);
    const avg = (s1 + s2) / 2;
    const pctDiff = (diff / avg) * 100;

    document.getElementById('hc-pd-res-val').innerText = `% ${pctDiff.toLocaleString('tr-TR', { maximumFractionDigits: 2 })}`;
    document.getElementById('hc-yuzde-fark-result').classList.add('visible');
}
