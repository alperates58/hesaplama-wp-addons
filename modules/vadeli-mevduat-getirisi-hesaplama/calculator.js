function hcVadeliMevduatGetirisiHesapla() {
    const capital = parseFloat(document.getElementById('hc-vmg-capital').value);
    const rate = parseFloat(document.getElementById('hc-vmg-rate').value);
    const days = parseInt(document.getElementById('hc-vmg-days').value);
    const type = document.getElementById('hc-vmg-type').value;

    if (!capital || !rate || !days) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Brüt Faiz = (Anapara * Faiz Oranı * Gün) / 36500
    const grossInterest = (capital * rate * days) / 36500;

    // 2026 Stopaj Oranları
    let taxRate = 0;
    if (type === 'tl') {
        if (days <= 180) { // 6 aya kadar
            taxRate = 17.5;
        } else if (days <= 365) { // 1 yıla kadar
            taxRate = 15;
        } else { // 1 yıldan uzun
            taxRate = 10;
        }
    } else if (type === 'usd') {
        taxRate = 25;
    } else if (type === 'gold') {
        taxRate = 15;
    }

    const taxAmount = (grossInterest * taxRate) / 100;
    const netInterest = grossInterest - taxAmount;
    const totalAmount = capital + netInterest;

    document.getElementById('hc-vmg-gross').innerText = grossInterest.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-vmg-tax-rate').innerText = taxRate.toLocaleString('tr-TR');
    document.getElementById('hc-vmg-tax').innerText = taxAmount.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-vmg-net').innerText = netInterest.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-vmg-total').innerText = totalAmount.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-vmg-result').classList.add('visible');
}
