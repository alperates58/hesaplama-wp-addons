function hcEPSHesapla() {
    const netIncome = parseFloat(document.getElementById('hc-eps-net-income').value) || 0;
    const shares = parseFloat(document.getElementById('hc-eps-shares').value) || 0;

    if (shares === 0) {
        alert('Hisse adedi sıfır olamaz.');
        return;
    }

    const eps = netIncome / shares;

    document.getElementById('hc-eps-res-val').innerText = eps.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-eps-result').classList.add('visible');
}
