function hcSulfiteQtyHesapla() {
    const total = parseFloat(document.getElementById('hc-sq-total').value) || 1;
    const amount = parseFloat(document.getElementById('hc-sq-amount').value) || 0;

    const conc = amount / total;

    document.getElementById('hc-res-sq-conc').innerText = conc.toFixed(1) + ' mg/L';
    
    if (conc >= 10) {
        document.getElementById('hc-sq-warning').style.display = 'block';
    } else {
        document.getElementById('hc-sq-warning').style.display = 'none';
    }

    document.getElementById('hc-sulfite-qty-result').classList.add('visible');
}
