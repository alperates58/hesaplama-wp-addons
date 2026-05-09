function hcAmortismanHesapla() {
    const value = parseFloat(document.getElementById('hc-am-value').value) || 0;
    const life = parseInt(document.getElementById('hc-am-life').value) || 0;
    const method = document.getElementById('hc-am-method').value;

    if (value <= 0 || life <= 0) {
        alert('Lütfen varlık değerini ve faydalı ömrü giriniz.');
        return;
    }

    let rate = 1 / life;
    if (method === 'declining') {
        rate = rate * 2;
        if (rate > 0.5) rate = 0.5; // Max 50% for declining balance in TR
    }

    const firstYear = value * rate;
    
    document.getElementById('hc-am-res-rate').innerText = '%' + (rate * 100).toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-am-res-first').innerText = firstYear.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-am-res-total').innerText = firstYear.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    // Simplified schedule display
    let html = '<table style="width:100%; border-collapse:collapse; margin-top:10px;">';
    html += '<thead><tr style="border-bottom:1px solid #ddd;"><th>Yıl</th><th>Tutar</th><th>Kalan Değer</th></tr></thead><tbody>';
    
    let currentVal = value;
    for (let i = 1; i <= life; i++) {
        let amount = 0;
        if (method === 'straight') {
            amount = value / life;
        } else {
            amount = currentVal * rate;
            if (i === life) amount = currentVal; // Last year fully depreciated
        }
        currentVal -= amount;
        if (currentVal < 0) currentVal = 0;

        html += `<tr><td style="text-align:center">${i}</td><td style="text-align:right">${amount.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td><td style="text-align:right">${currentVal.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td></tr>`;
    }
    html += '</tbody></table>';
    
    document.getElementById('hc-am-schedule').innerHTML = html;
    document.getElementById('hc-amortisman-result').classList.add('visible');
}
