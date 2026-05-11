function hcLatentHeatHesapla() {
    const m = parseFloat(document.getElementById('hc-lh-m').value);
    const l = parseFloat(document.getElementById('hc-lh-l').value);

    if (isNaN(m) || isNaN(l) || m < 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Q = m * L
    const q = m * l;

    document.getElementById('hc-lh-res-val').innerText = q.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kJ';
    
    document.getElementById('hc-lh-result').classList.add('visible');
}
