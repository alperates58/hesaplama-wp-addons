function hcBesiHayvaniKiloHesapla() {
    const w1 = parseFloat(document.getElementById('hc-bh-w1').value);
    const w2 = parseFloat(document.getElementById('hc-bh-w2').value);
    const days = parseFloat(document.getElementById('hc-bh-days').value);

    if (isNaN(w1) || isNaN(w2) || isNaN(days) || w1 <= 0 || w2 <= w1 || days <= 0) {
        alert('Lütfen geçerli değerler giriniz (Son ağırlık ilk ağırlıktan büyük olmalıdır).');
        return;
    }

    const totalGain = w2 - w1;
    const dailyGain = totalGain / days;

    document.getElementById('hc-bh-total-val').innerText = totalGain.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg';
    document.getElementById('hc-bh-daily-val').innerText = dailyGain.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kg/gün';
    
    document.getElementById('hc-bh-result').classList.add('visible');
}
