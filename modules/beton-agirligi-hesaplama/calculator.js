function hcBetonAgirlikHesapla() {
    const vol = parseFloat(document.getElementById('hc-ba-vol').value);

    if (isNaN(vol) || vol <= 0) {
        alert('Lütfen geçerli bir hacim giriniz.');
        return;
    }

    const weightKg = vol * 2400;

    if (weightKg >= 1000) {
        document.getElementById('hc-ba-val').innerText = (weightKg / 1000).toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Ton';
    } else {
        document.getElementById('hc-ba-val').innerText = weightKg.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' kg';
    }

    document.getElementById('hc-ba-result').classList.add('visible');
}
