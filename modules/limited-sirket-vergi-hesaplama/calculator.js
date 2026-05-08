function hcLtdVergiHesapla() {
    const profit = parseFloat(document.getElementById('hc-ls-profit').value) || 0;
    const isDist = document.getElementById('hc-ls-dist').value === "1";

    const kv = profit * 0.25;
    const remaining = profit - kv;
    const stopaj = isDist ? (remaining * 0.10) : 0;
    const totalTax = kv + stopaj;

    document.getElementById('hc-ls-res-kv').innerText = kv.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ls-res-stopaj').innerText = stopaj.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ls-res-total').innerText = totalTax.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-ltd-result').classList.add('visible');
}
