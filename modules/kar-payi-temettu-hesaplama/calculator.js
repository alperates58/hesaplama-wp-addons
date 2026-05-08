function hcTemettuHesapla() {
    const profit = parseFloat(document.getElementById('hc-tm-profit').value) || 0;
    const ratio = parseFloat(document.getElementById('hc-tm-ratio').value) / 100;
    const share = parseFloat(document.getElementById('hc-tm-share').value) / 100;

    const totalDistributed = profit * ratio;
    const gross = totalDistributed * share;
    const tax = gross * 0.10;
    const net = gross - tax;

    document.getElementById('hc-tm-res-gross').innerText = gross.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-tm-res-tax').innerText = tax.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-tm-res-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-temettu-result').classList.add('visible');
}
