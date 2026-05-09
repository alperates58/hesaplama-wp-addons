function hcDSHesapla() {
    const lambda = parseFloat(document.getElementById('hc-ds-lambda').value);

    if (isNaN(lambda) || lambda <= 0) {
        alert('Lütfen geçerli bir dalga boyu giriniz.');
        return;
    }

    const k = (2 * Math.PI) / lambda;
    const nuTilde = 1 / lambda;

    document.getElementById('hc-ds-angular').innerText = k.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-ds-spectro').innerText = nuTilde.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    
    document.getElementById('hc-ds-result').classList.add('visible');
}
