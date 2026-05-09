function hcSekerTuketimiHesapla() {
    const grams = parseFloat(document.getElementById('hc-sc-grams').value);
    const tdee = parseFloat(document.getElementById('hc-sc-tdee').value) || 2000;

    if (!grams) {
        alert('Lütfen şeker miktarını girin.');
        return;
    }

    const kcal = grams * 4;
    const percent = (kcal / tdee) * 100;

    document.getElementById('hc-sc-kcal').innerText = Math.round(kcal).toLocaleString('tr-TR') + ' kcal';
    document.getElementById('hc-sc-percent').innerText = '%' + percent.toFixed(1).toLocaleString('tr-TR');

    const statusBox = document.getElementById('hc-sc-status');
    if (percent <= 5) {
        statusBox.innerText = 'İDEAL: Şeker tüketiminiz çok düşük seviyede.';
        statusBox.style.backgroundColor = '#e8f5e9';
        statusBox.style.color = '#2e7d32';
    } else if (percent <= 10) {
        statusBox.innerText = 'NORMAL: Şeker tüketiminiz önerilen sınırlar dahilinde.';
        statusBox.style.backgroundColor = '#fff3e0';
        statusBox.style.color = '#ef6c00';
    } else {
        statusBox.innerText = 'YÜKSEK: Şeker tüketiminiz önerilen limiti aşmış durumda.';
        statusBox.style.backgroundColor = '#ffebee';
        statusBox.style.color = '#c62828';
    }

    document.getElementById('hc-sugar-consumption-result').classList.add('visible');
}
