function hcEthereumGasUcretiHesapla() {
    var limit = parseFloat(document.getElementById('hc-egu-limit').value) || 21000;
    var gwei = parseFloat(document.getElementById('hc-egu-gwei').value) || 0;
    var ethFiyat = parseFloat(document.getElementById('hc-egu-eth').value) || 0;

    if (gwei <= 0 || ethFiyat <= 0) {
        alert('Lütfen geçerli gwei ve ETH fiyatı giriniz.');
        return;
    }

    // Gas Ücreti (ETH) = Gas Limit * Gas Fiyatı (Gwei) * 10^-9
    var ethUcret = limit * gwei * 0.000000001;
    var usdUcret = ethUcret * ethFiyat;

    document.getElementById('hc-egu-res-limit').innerText = limit.toLocaleString('tr-TR');
    document.getElementById('hc-egu-res-eth').innerText = ethUcret.toFixed(6) + ' ETH';
    document.getElementById('hc-egu-res-usd').innerText = usdUcret.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' $';

    document.getElementById('hc-egu-result').classList.add('visible');
}