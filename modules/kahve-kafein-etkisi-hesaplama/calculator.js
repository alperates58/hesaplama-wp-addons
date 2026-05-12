function hcKafeinEtkisiHesapla() {
    const amount = parseFloat(document.getElementById('hc-ce-amount').value);
    const hours = parseFloat(document.getElementById('hc-ce-hours').value);

    if (isNaN(amount) || amount <= 0 || hours < 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // Average half-life of caffeine is ~5 hours
    const halfLife = 5;
    
    // Remaining = Amount * 0.5 ^ (hours / halfLife)
    const remaining = amount * Math.pow(0.5, hours / halfLife);

    const resultDiv = document.getElementById('hc-caffeine-effect-result');
    document.getElementById('hc-ce-val').innerText = Math.round(remaining) + ' mg';
    
    const percentage = (remaining / amount) * 100;
    document.getElementById('hc-ce-bar').style.width = percentage + '%';

    let note = "Kafeinin zirve etkisi tüketimden 30-60 dakika sonra görülür.";
    if (remaining > 50) {
        note += " Şu an hala aktif kafein etkisindesiniz, uyku düzeninizi etkileyebilir.";
    } else {
        note += " Kafein etkisi azalmaya başlamış.";
    }
    
    document.getElementById('hc-ce-note').innerText = note;
    resultDiv.classList.add('visible');
}
