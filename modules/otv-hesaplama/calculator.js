function hcOTV_Hesapla() {
    const price = parseFloat(document.getElementById('hc-ot-price').value) || 0;
    const rate = parseFloat(document.getElementById('hc-ot-rate').value) / 100;

    const otv = price * rate;
    const kdv = (price + otv) * 0.20;
    const total = price + otv + kdv;

    document.getElementById('hc-ot-res-otv').innerText = otv.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ot-res-kdv').innerText = kdv.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ot-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-otv-result').classList.add('visible');
}
