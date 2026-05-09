function hcVadeFarkiHesapla() {
    const cash = parseFloat(document.getElementById('hc-vf-cash').value) || 0;
    const months = parseInt(document.getElementById('hc-vf-months').value) || 0;
    const rate = parseFloat(document.getElementById('hc-vf-rate').value) / 100;

    const diff = cash * rate * months;
    const total = cash + diff;
    const monthly = months > 0 ? total / months : total;

    document.getElementById('hc-vf-res-diff').innerText = diff.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-vf-res-monthly').innerText = monthly.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-vf-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-vade-farki-result').classList.add('visible');
}
