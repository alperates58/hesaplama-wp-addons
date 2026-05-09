function hcGunlukFaizHesapla() {
    const p = parseFloat(document.getElementById('hc-gi-principal').value) || 0;
    const r = parseFloat(document.getElementById('hc-gi-rate').value) || 0;
    const d = parseInt(document.getElementById('hc-gi-days').value) || 0;
    const tax = (parseFloat(document.getElementById('hc-gi-tax').value) || 0) / 100;

    const gross = (p * r * d) / 36500;
    const net = gross * (1 - tax);
    const total = p + net;

    document.getElementById('hc-gi-res-gross').innerText = gross.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-gi-res-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-gi-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-daily-interest-result').classList.add('visible');
}
