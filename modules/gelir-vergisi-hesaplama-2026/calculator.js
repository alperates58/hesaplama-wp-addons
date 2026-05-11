function hcGelirVergisi2026Hesapla() {
    const matrah = parseFloat(document.getElementById('hc-gv-matrah').value);
    const type = document.getElementById('hc-gv-type').value;

    if (isNaN(matrah) || matrah < 0) {
        alert('Lütfen geçerli bir matrah girin.');
        return;
    }

    // 2026 Dilimleri
    const brackets = [190000, 400000, (type === 'wage' ? 1500000 : 1000000), 5300000];
    const rates = [0.15, 0.20, 0.27, 0.35, 0.40];

    let tax = 0;
    let remaining = matrah;

    if (remaining > brackets[3]) {
        tax += (remaining - brackets[3]) * rates[4];
        remaining = brackets[3];
    }
    if (remaining > brackets[2]) {
        tax += (remaining - brackets[2]) * rates[3];
        remaining = brackets[2];
    }
    if (remaining > brackets[1]) {
        tax += (remaining - brackets[1]) * rates[2];
        remaining = brackets[1];
    }
    if (remaining > brackets[0]) {
        tax += (remaining - brackets[0]) * rates[1];
        remaining = brackets[0];
    }
    tax += remaining * rates[0];

    const effectiveRate = (tax / matrah) * 100;

    document.getElementById('hc-gv-tax').innerText = tax.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-gv-rate').innerText = '%' + effectiveRate.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    document.getElementById('hc-gv-result').classList.add('visible');
}
