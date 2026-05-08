function hcCompoundIntHesapla() {
    const p = parseFloat(document.getElementById('hc-ci-principal').value) || 0;
    const r = (parseFloat(document.getElementById('hc-ci-rate').value) || 0) / 100;
    const t = parseFloat(document.getElementById('hc-ci-years').value) || 0;
    const n = parseInt(document.getElementById('hc-ci-freq').value) || 1;

    // A = P(1 + r/n)^(nt)
    const amount = p * Math.pow(1 + (r / n), n * t);
    const interest = amount - p;

    document.getElementById('hc-ci-res-interest').innerText = interest.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ci-res-total').innerText = amount.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-compound-int-result').classList.add('visible');
}
