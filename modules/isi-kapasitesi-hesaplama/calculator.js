function hcHeatCapHesapla() {
    const m = parseFloat(document.getElementById('hc-hc-m').value);
    const c = parseFloat(document.getElementById('hc-hc-c').value);

    if (isNaN(m) || isNaN(c) || m < 0 || c < 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // C = m * c
    const cap = m * c;

    document.getElementById('hc-hc-res-val').innerText = cap.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kJ/K';
    
    document.getElementById('hc-hc-result').classList.add('visible');
}
