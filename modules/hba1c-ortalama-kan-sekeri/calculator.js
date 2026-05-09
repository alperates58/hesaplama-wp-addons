function hcHbA1cHesapla() {
    const hba1c = parseFloat(document.getElementById('hc-he-hba1c').value);

    if (isNaN(hba1c)) {
        alert('Lütfen HbA1c değerini girin.');
        return;
    }

    // eAG (mg/dL) = (28.7 * HbA1c) - 46.7
    const eag = (28.7 * hba1c) - 46.7;
    
    document.getElementById('hc-he-value').innerText = Math.round(eag).toLocaleString('tr-TR') + ' mg/dL';

    const interp = document.getElementById('hc-he-interp');
    if (hba1c < 5.7) {
        interp.innerText = 'Normal (Diyabet Riski Yok)';
        interp.style.color = '#2e7d32';
    } else if (hba1c <= 6.4) {
        interp.innerText = 'Prediyabet (Gizli Şeker)';
        interp.style.color = '#ef6c00';
    } else {
        interp.innerText = 'Diyabet (Şeker Hastalığı)';
        interp.style.color = '#c62828';
    }

    document.getElementById('hc-hba1c-eag-result').classList.add('visible');
}
