function hcBeklenenParasalDeğerHesapla() {
    const probs = document.querySelectorAll('.hc-emv-prob');
    const impacts = document.querySelectorAll('.hc-emv-impact');

    let totalEmv = 0;
    let totalProb = 0;

    for (let i = 0; i < probs.length; i++) {
        const p = parseFloat(probs[i].value) || 0;
        const v = parseFloat(impacts[i].value) || 0;

        totalProb += p;
        totalEmv += (p / 100) * v;
    }

    if (totalProb !== 100) {
        alert('Uyarı: Olasılıkların toplamı %100 değil (Şu an: %' + totalProb + '). Lütfen olasılıkları kontrol edin.');
    }

    document.getElementById('hc-emv-value').innerText = totalEmv.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-emv-result').classList.add('visible');
}
