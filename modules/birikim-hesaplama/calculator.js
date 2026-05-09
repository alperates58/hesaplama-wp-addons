function hcSavingsHesapla() {
    const p = parseFloat(document.getElementById('hc-s-initial').value) || 0;
    const pmt = parseFloat(document.getElementById('hc-s-monthly').value) || 0;
    const annualRate = parseFloat(document.getElementById('hc-s-rate').value) / 100;
    const years = parseInt(document.getElementById('hc-s-years').value) || 0;

    const r = annualRate / 12;
    const n = years * 12;

    let total = 0;
    if (r === 0) {
        total = p + (pmt * n);
    } else {
        // FV = P(1+r)^n + PMT [((1+r)^n - 1) / r]
        const compoundInitial = p * Math.pow(1 + r, n);
        const compoundPMT = pmt * (Math.pow(1 + r, n) - 1) / r;
        total = compoundInitial + compoundPMT;
    }

    const totalInvested = p + (pmt * n);
    const totalInterest = total - totalInvested;

    document.getElementById('hc-s-res-principal').innerText = totalInvested.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-s-res-interest').innerText = totalInterest.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-s-res-total').innerText = total.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' ₺';

    document.getElementById('hc-savings-result').classList.add('visible');
}
