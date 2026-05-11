function hcAkreditifHesapla() {
    const amount = parseFloat(document.getElementById('hc-lc-amount').value);
    const openingRate = parseFloat(document.getElementById('hc-lc-opening').value) / 100;
    const confirmRate = parseFloat(document.getElementById('hc-lc-confirm').value) / 100 || 0;
    const fixed = parseFloat(document.getElementById('hc-lc-fixed').value) || 0;

    if (isNaN(amount) || amount <= 0) {
        alert('Lütfen geçerli bir tutar girin.');
        return;
    }

    const openingCost = amount * openingRate;
    const confirmCost = amount * confirmRate;
    const totalComm = openingCost + confirmCost;
    const total = totalComm + fixed;

    document.getElementById('hc-lc-res-comm').innerText = totalComm.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    document.getElementById('hc-lc-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    document.getElementById('hc-lc-result').classList.add('visible');
}
