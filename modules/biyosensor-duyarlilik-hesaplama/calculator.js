function hcBiosensorHesapla() {
    const di = parseFloat(document.getElementById('hc-bs-di').value);
    const dc = parseFloat(document.getElementById('hc-bs-dc').value);
    const a = parseFloat(document.getElementById('hc-bs-a').value);

    if (isNaN(di) || isNaN(dc) || isNaN(a) || dc <= 0 || a <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // S = dI / (dC * A)
    const sensitivity = di / (dc * a);

    document.getElementById('hc-bs-res-val').innerText = sensitivity.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' μA/mM·cm²';
    
    document.getElementById('hc-bs-result').classList.add('visible');
}
