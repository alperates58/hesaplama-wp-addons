function hcHydRadHesapla() {
    const a = parseFloat(document.getElementById('hc-hr-a').value);
    const p = parseFloat(document.getElementById('hc-hr-p').value);

    if (isNaN(a) || isNaN(p) || p <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Rh = A / P
    const rh = a / p;

    document.getElementById('hc-hr-res-val').innerText = rh.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' m';
    
    document.getElementById('hc-hr-result').classList.add('visible');
}
