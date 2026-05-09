function hcAEHesapla() {
    const rho = parseFloat(document.getElementById('hc-ae-density').value);
    const c = parseFloat(document.getElementById('hc-ae-speed').value);

    if (isNaN(rho) || isNaN(c) || rho <= 0 || c <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    const z = rho * c;

    document.getElementById('hc-ae-val').innerText = z.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Pa·s/m';
    document.getElementById('hc-ae-result').classList.add('visible');
}
