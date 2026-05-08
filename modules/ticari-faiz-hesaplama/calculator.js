function hcTicariFaizHesapla() {
    const p = parseFloat(document.getElementById('hc-tf-principal').value) || 0;
    const r = parseFloat(document.getElementById('hc-tf-rate').value) || 0;
    const t = parseInt(document.getElementById('hc-tf-days').value) || 0;

    const interest = (p * r * t) / 36000;
    const total = p + interest;

    document.getElementById('hc-tf-res-gross').innerText = interest.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-tf-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-ticari-faiz-result').classList.add('visible');
}
