function hcAskerlikBorcHesapla() {
    const duration = document.getElementById('hc-ask-duration').value;
    let days = 0;

    if (duration === 'other') {
        days = parseInt(document.getElementById('hc-ask-days').value) || 0;
    } else {
        days = parseInt(duration) * 30;
    }

    if (days <= 0) {
        alert('Lütfen geçerli bir süre giriniz.');
        return;
    }

    const dailyCost = 352.32; // 2026 min rate
    const total = days * dailyCost;

    document.getElementById('hc-ask-res-days').innerText = days.toLocaleString('tr-TR') + ' Gün';
    document.getElementById('hc-ask-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-askerlik-result').classList.add('visible');
}
