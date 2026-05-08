function hcPiyasaDegeriHesapla() {
    const price = parseFloat(document.getElementById('hc-mc-price').value) || 0;
    const shares = parseFloat(document.getElementById('hc-mc-shares').value) || 0;

    const mcap = price * shares;

    document.getElementById('hc-mc-res-val').innerText = mcap.toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-mcap-result').classList.add('visible');
}
