function hcGelirVergisiHesapla() {
    const amount = parseFloat(document.getElementById('hc-gv-amount').value);
    const type = document.getElementById('hc-gv-type').value;

    if (isNaN(amount) || amount <= 0) {
        alert('Lütfen geçerli bir matrah tutarı girin.');
        return;
    }

    // 2026 Tahmini Dilimler
    const brackets = [190000, 400000, (type === 'wage' ? 1500000 : 1000000), 5300000];
    const rates = [0.15, 0.20, 0.27, 0.35, 0.40];

    let tax = 0;
    let remaining = amount;

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

    const net = amount - tax;
    const avgRate = (tax / amount) * 100;

    document.getElementById('hc-gv-res-total').innerText = tax.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-gv-res-avg').innerText = '%' + avgRate.toLocaleString('tr-TR', { minimumFractionDigits: 1 });
    document.getElementById('hc-gv-res-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-gv-result').classList.add('visible');
}
