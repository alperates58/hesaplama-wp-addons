function hcBHHHesapla() {
    const m = parseFloat(document.getElementById('hc-bhh-mass').value);
    const k = parseFloat(document.getElementById('hc-bhh-k').value);

    if (isNaN(m) || isNaN(k) || m <= 0 || k <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    const period = 2 * Math.PI * Math.sqrt(m / k);
    const freq = 1 / period;

    document.getElementById('hc-bhh-period').innerText = period.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' s';
    document.getElementById('hc-bhh-freq').innerText = freq.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' Hz';
    
    document.getElementById('hc-bhh-result').classList.add('visible');
}
