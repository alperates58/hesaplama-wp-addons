function hcRejectRateHesapla() {
    const total = parseInt(document.getElementById('hc-rr-total').value) || 1;
    const reject = parseInt(document.getElementById('hc-rr-reject').value) || 0;

    const rate = (reject / total) * 100;
    const success = 100 - rate;

    document.getElementById('hc-res-rr-val').innerText = '%' + rate.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-res-rr-success').innerText = '%' + success.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    document.getElementById('hc-reject-rate-result').classList.add('visible');
}
