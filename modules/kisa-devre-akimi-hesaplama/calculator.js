function hcShortCircuitHesapla() {
    const s = parseFloat(document.getElementById('hc-sc-s').value);
    const v = parseFloat(document.getElementById('hc-sc-v').value);
    const uk = parseFloat(document.getElementById('hc-sc-uk').value);

    if (isNaN(s) || isNaN(v) || isNaN(uk) || v <= 0 || uk <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // In = S / (sqrt(3) * V)
    const inom = (s * 1000) / (Math.sqrt(3) * v);
    
    // Isc = In / (Uk / 100) = (In * 100) / Uk
    const isc = (inom * 100) / uk;

    document.getElementById('hc-sc-res-val').innerText = Math.round(isc).toLocaleString('tr-TR') + ' Amper';
    document.getElementById('hc-sc-res-ka').innerText = (isc / 1000).toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kA';
    
    document.getElementById('hc-sc-result').classList.add('visible');
}
