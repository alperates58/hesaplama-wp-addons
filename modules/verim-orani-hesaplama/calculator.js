function hcEffRateHesapla() {
    const output = parseFloat(document.getElementById('hc-er-out').value);
    const input = parseFloat(document.getElementById('hc-er-in').value);

    if (isNaN(output) || isNaN(input) || input === 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const efficiency = (output / input) * 100;

    document.getElementById('hc-er-res-val').innerText = `% ${efficiency.toLocaleString('tr-TR', { maximumFractionDigits: 2 })}`;
    document.getElementById('hc-verim-orani-result').classList.add('visible');
}
