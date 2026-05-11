function hcKvaToAmpHesapla() {
    const kva = parseFloat(document.getElementById('hc-ka-kva').value);
    const v = parseFloat(document.getElementById('hc-ka-v').value);
    const phase = parseInt(document.getElementById('hc-ka-phase').value);

    if (isNaN(kva) || isNaN(v) || v <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    let i = 0;
    if (phase === 1) {
        // I = (kVA * 1000) / V
        i = (kva * 1000) / v;
    } else {
        // I = (kVA * 1000) / (sqrt(3) * V)
        i = (kva * 1000) / (Math.sqrt(3) * v);
    }

    document.getElementById('hc-ka-res-val').innerText = i.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Amper';
    
    document.getElementById('hc-ka-result').classList.add('visible');
}
