function hcYksPctHesapla() {
    const net = parseFloat(document.getElementById('hc-yp-net').value);
    const total = parseFloat(document.getElementById('hc-yp-total').value);

    if (isNaN(net) || net < 0) {
        alert('Lütfen geçerli bir net sayısı giriniz.');
        return;
    }

    const pct = (net / total) * 100;

    document.getElementById('hc-yp-res-val').innerText = `% ${pct.toLocaleString('tr-TR', { maximumFractionDigits: 2 })}`;
    document.getElementById('hc-yks-net-result').classList.add('visible');
}
