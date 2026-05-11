function hcKrediYenilemeHesapla() {
    const currentPayment = parseFloat(document.getElementById('hc-kyb-current-payment').value);
    const newPayment = parseFloat(document.getElementById('hc-kyb-new-payment').value);
    const costs = parseFloat(document.getElementById('hc-kyb-costs').value);

    if (isNaN(currentPayment) || isNaN(newPayment) || isNaN(costs)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const savings = currentPayment - newPayment;

    if (savings <= 0) {
        alert('Yeni taksit tutarı mevcut olandan yüksek veya eşit. Yenileme tasarruf sağlamıyor.');
        return;
    }

    const months = costs / savings;

    document.getElementById('hc-kyb-monthly-savings').innerText = savings.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kyb-months').innerText = Math.ceil(months).toLocaleString('tr-TR') + ' Ay';

    document.getElementById('hc-kyb-result').classList.add('visible');
}
