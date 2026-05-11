function hcWebReklamGeliriHesapla() {
    const impressions = parseFloat(document.getElementById('hc-wr-impressions').value);
    const rpm = parseFloat(document.getElementById('hc-wr-rpm').value);

    if (isNaN(impressions) || isNaN(rpm) || impressions < 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const total = (impressions / 1000) * rpm;

    document.getElementById('hc-wr-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-wr-result').classList.add('visible');
}
