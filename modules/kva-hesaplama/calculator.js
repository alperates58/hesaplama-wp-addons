function hcKvaCalcHesapla() {
    const i = parseFloat(document.getElementById('hc-kv-i').value);
    const v = parseFloat(document.getElementById('hc-kv-v').value);
    const phase = parseInt(document.getElementById('hc-kv-phase').value);

    if (isNaN(i) || isNaN(v) || v <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    let kva = 0;
    if (phase === 1) {
        // S = (V * I) / 1000
        kva = (v * i) / 1000;
    } else {
        // S = (sqrt(3) * V * I) / 1000
        kva = (Math.sqrt(3) * v * i) / 1000;
    }

    document.getElementById('hc-kv-res-val').innerText = kva.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kVA';
    
    document.getElementById('hc-kv-result').classList.add('visible');
}
