function hcDoublingTimeHesapla() {
    const rate = parseFloat(document.getElementById('hc-dt-rate').value);

    if (!rate || rate <= 0) {
        alert('Lütfen pozitif bir büyüme oranı giriniz.');
        return;
    }

    // Rule of 72: Time = 72 / rate
    // More accurate: Time = ln(2) / ln(1 + rate/100)
    const timeExact = Math.log(2) / Math.log(1 + rate / 100);

    document.getElementById('hc-dt-res-val').innerText = timeExact.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 });
    document.getElementById('hc-doubling-result').classList.add('visible');
}
