function hcThermalResHesapla() {
    const d = parseFloat(document.getElementById('hc-tr-d').value);
    const k = parseFloat(document.getElementById('hc-tr-k').value);
    const a = parseFloat(document.getElementById('hc-tr-a').value);

    if (isNaN(d) || isNaN(k) || isNaN(a) || k <= 0 || a <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Rth = d / (k * A)
    const rth = d / (k * a);

    document.getElementById('hc-tr-res-val').innerText = rth.toLocaleString('tr-TR', { maximumFractionDigits: 5 }) + ' K/W';
    
    document.getElementById('hc-tr-result').classList.add('visible');
}
