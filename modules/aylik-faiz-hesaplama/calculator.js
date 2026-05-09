function hcAylikFaizHesapla() {
    const p = parseFloat(document.getElementById('hc-mi-principal').value) || 0;
    const r = parseFloat(document.getElementById('hc-mi-rate').value) || 0;
    const m = parseInt(document.getElementById('hc-mi-months').value) || 0;
    const tax = (parseFloat(document.getElementById('hc-mi-tax').value) || 0) / 100;

    const gross = (p * r * m) / 1200;
    const net = gross * (1 - tax);
    const total = p + net;

    document.getElementById('hc-mi-res-gross').innerText = gross.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-mi-res-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-mi-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-monthly-interest-result').classList.add('visible');
}
