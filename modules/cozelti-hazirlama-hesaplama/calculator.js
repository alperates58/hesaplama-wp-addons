function hcCozeltiHazirlamaHesapla() {
    const mw = parseFloat(document.getElementById('hc-sol-mw').value);
    const molarity = parseFloat(document.getElementById('hc-sol-molarity').value);
    const volMl = parseFloat(document.getElementById('hc-sol-vol').value);

    if (isNaN(mw) || isNaN(molarity) || isNaN(volMl) || mw <= 0 || molarity <= 0 || volMl <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    const volL = volMl / 1000;
    const mass = molarity * volL * mw;

    document.getElementById('hc-sol-val').innerText = mass.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' g';
    document.getElementById('hc-sol-note').innerText = `${volMl} mL ${molarity} M çözelti için ${mass.toLocaleString('tr-TR')} gram madde tartılmalıdır.`;
    document.getElementById('hc-sol-result').classList.add('visible');
}
