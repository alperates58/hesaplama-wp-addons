function hcSavingsGoalHesapla() {
    const target = parseFloat(document.getElementById('hc-sg-target').value) || 0;
    const years = parseInt(document.getElementById('hc-sg-years').value) || 0;
    const annualRate = parseFloat(document.getElementById('hc-sg-rate').value) / 100;

    const n = years * 12;
    const r = annualRate / 12;

    let pmt = 0;
    if (r === 0) {
        pmt = target / n;
    } else {
        // PMT = (FV * r) / [((1+r)^n - 1)]
        pmt = (target * r) / (Math.pow(1 + r, n) - 1);
    }

    document.getElementById('hc-sg-res-val').innerText = pmt.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' ₺';

    document.getElementById('hc-savings-goal-result').classList.add('visible');
}
