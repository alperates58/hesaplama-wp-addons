function hcTuvaletSuTüketimiHesapla() {
    const flushes = parseFloat(document.getElementById('hc-tw-flushes').value);
    const volume = parseFloat(document.getElementById('hc-tw-type').value);

    if (!flushes) return;

    const yearlyLiters = flushes * volume * 365;
    const savingPot = (volume - 4.5) * flushes * 365;

    document.getElementById('hc-tw-val').innerText = Math.round(yearlyLiters).toLocaleString('tr-TR') + ' Litre';
    
    if (savingPot > 0) {
        document.getElementById('hc-tw-info').innerText = `Tasarruflu sisteme geçerek yılda ${Math.round(savingPot).toLocaleString('tr-TR')} Litre su kurtarabilirsiniz.`;
    } else {
        document.getElementById('hc-tw-info').innerText = `Zaten tasarruflu bir sistem kullanıyorsunuz.`;
    }
    
    document.getElementById('hc-tw-result').classList.add('visible');
}
