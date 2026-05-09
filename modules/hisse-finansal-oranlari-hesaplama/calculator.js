function hcStockRatiosHesapla() {
    const price = parseFloat(document.getElementById('hc-sr-price').value) || 0;
    const shares = parseFloat(document.getElementById('hc-sr-shares').value) || 0;
    const profit = parseFloat(document.getElementById('hc-sr-profit').value) || 0;
    const equity = parseFloat(document.getElementById('hc-sr-equity').value) || 0;
    const ebitda = parseFloat(document.getElementById('hc-sr-ebitda').value) || 0;
    const netDebt = parseFloat(document.getElementById('hc-sr-debt').value) || 0;

    if (shares === 0) {
        alert('Hisse adedi girilmelidir.');
        return;
    }

    const mcap = price * shares;
    const ev = mcap + netDebt;
    const eps = profit / shares;

    const pe = eps !== 0 ? price / eps : 0;
    const pb = equity !== 0 ? mcap / equity : 0;
    const evebitda = ebitda !== 0 ? ev / ebitda : 0;

    document.getElementById('hc-sr-res-pe').innerText = pe !== 0 ? pe.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) : "-";
    document.getElementById('hc-sr-res-pb').innerText = pb !== 0 ? pb.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) : "-";
    document.getElementById('hc-sr-res-evebitda').innerText = evebitda !== 0 ? evebitda.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) : "-";
    document.getElementById('hc-sr-res-eps').innerText = eps.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-stock-ratios-result').classList.add('visible');
}
