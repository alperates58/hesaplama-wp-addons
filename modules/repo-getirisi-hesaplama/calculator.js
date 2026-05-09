function hcRepoGetirisiHesapla() {
    const p = parseFloat(document.getElementById('hc-rg-p').value) || 0;
    const r = parseFloat(document.getElementById('hc-rg-r').value) || 0;
    const d = parseInt(document.getElementById('hc-rg-d').value) || 0;

    const gross = (p * r * d) / 36500;
    const tax = gross * 0.15;
    const net = gross - tax;

    document.getElementById('hc-rg-res-gross').innerText = gross.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-rg-res-tax').innerText = tax.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-rg-res-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-repo-result').classList.add('visible');
}
