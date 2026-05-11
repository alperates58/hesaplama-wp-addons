function hcKkBorcuHesapla() {
    const balance = parseFloat(document.getElementById('hc-kkb-balance').value);
    const payment = parseFloat(document.getElementById('hc-kkb-payment').value) || 0;
    const monthlyRate = parseFloat(document.getElementById('hc-kkb-rate').value) / 100;

    if (isNaN(balance) || balance <= 0) {
        alert('Lütfen toplam borç tutarını girin.');
        return;
    }

    const remainingPrincipal = Math.max(0, balance - payment);
    
    // Vergi Dahil Faiz Oranı (KKDF %15 + BSMV %15)
    // Faiz * (1 + 0.15 + 0.15) = Faiz * 1.30
    const taxFactor = 1.30;
    const monthlyInterest = remainingPrincipal * monthlyRate * taxFactor;
    const nextMonthTotal = remainingPrincipal + monthlyInterest;

    document.getElementById('hc-kkb-res-principal').innerText = remainingPrincipal.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kkb-res-interest').innerText = monthlyInterest.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kkb-res-total').innerText = nextMonthTotal.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-kkb-result').classList.add('visible');
}
