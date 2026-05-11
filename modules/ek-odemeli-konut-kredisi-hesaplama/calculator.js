function hcEkOdemeliKonutKredisiHesapla() {
    const amount = parseFloat(document.getElementById('hc-eokk-amount').value);
    const rate = parseFloat(document.getElementById('hc-eokk-rate').value) / 100;
    const term = parseInt(document.getElementById('hc-eokk-term').value);
    const extra = parseFloat(document.getElementById('hc-eokk-extra').value) || 0;

    if (!amount || !rate || !term) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Mevcut Taksit
    const installment = (amount * rate * Math.pow(1 + rate, term)) / (Math.pow(1 + rate, term) - 1);
    const totalBefore = installment * term;

    // Ek ödeme sonrası yeni bakiye
    const newBalance = amount - extra;
    if (newBalance <= 0) {
        document.getElementById('hc-eokk-new-term').innerText = '0 Ay';
        document.getElementById('hc-eokk-term-reduction').innerText = term + ' Ay';
        document.getElementById('hc-eokk-savings').innerText = (totalBefore - amount).toLocaleString('tr-TR') + ' ₺';
        document.getElementById('hc-eokk-result').classList.add('visible');
        return;
    }

    // Yeni vade hesabı (Taksit değişmez varsayımıyla)
    // n = -log(1 - (PV * i) / P) / log(1 + i)
    const newTerm = -Math.log(1 - (newBalance * rate) / installment) / Math.log(1 + rate);
    const roundedNewTerm = Math.ceil(newTerm);
    
    const totalAfter = (installment * newTerm) + extra; // Yaklaşık
    const savings = totalBefore - totalAfter;

    document.getElementById('hc-eokk-new-term').innerText = roundedNewTerm + ' Ay';
    document.getElementById('hc-eokk-term-reduction').innerText = (term - roundedNewTerm) + ' Ay';
    document.getElementById('hc-eokk-savings').innerText = Math.max(0, savings).toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-eokk-result').classList.add('visible');
}
