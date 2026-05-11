function hcShearStressHesapla() {
    const v = parseFloat(document.getElementById('hc-ss-v').value);
    const a = parseFloat(document.getElementById('hc-ss-a').value);

    if (isNaN(v) || isNaN(a) || a <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // tau = V / A
    const tau = v / a;

    document.getElementById('hc-ss-res-val').innerText = tau.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' MPa';
    
    document.getElementById('hc-ss-result').classList.add('visible');
}
