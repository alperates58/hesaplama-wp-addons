function hcSenetFaiziHesapla() {
    const amount = parseFloat(document.getElementById('hc-sf-amount').value) || 0;
    const days = parseInt(document.getElementById('hc-sf-days').value) || 0;
    const rate = parseFloat(document.getElementById('hc-sf-rate').value) || 0;

    const interest = (amount * rate * days) / 36000;
    const total = amount + interest;

    document.getElementById('hc-sf-res-interest').innerText = interest.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-sf-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-senet-faiz-result').classList.add('visible');
}
