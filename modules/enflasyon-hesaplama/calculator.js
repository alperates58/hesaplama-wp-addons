function hcEnflasyonHesapla() {
    const oldVal = parseFloat(document.getElementById('hc-e-old').value);
    const newVal = parseFloat(document.getElementById('hc-e-new').value);

    if (isNaN(oldVal) || isNaN(newVal) || oldVal === 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const inflation = ((newVal - oldVal) / oldVal) * 100;
    const lossOfPower = (1 - (oldVal / newVal)) * 100;

    document.getElementById('hc-e-res-ratio').innerText = '%' + inflation.toLocaleString('tr-TR', { minimumFractionDigits: 2 });
    document.getElementById('hc-e-res-loss').innerText = '%' + lossOfPower.toLocaleString('tr-TR', { minimumFractionDigits: 2 });

    document.getElementById('hc-e-result').classList.add('visible');
}
