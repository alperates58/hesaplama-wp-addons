function hcQUICKIHesapla() {
    const glucose = parseFloat(document.getElementById('hc-qi-glucose').value);
    const insulin = parseFloat(document.getElementById('hc-qi-insulin').value);

    if (isNaN(glucose) || isNaN(insulin) || glucose <= 0 || insulin <= 0) {
        alert('Lütfen geçerli pozitif değerler girin.');
        return;
    }

    // QUICKI = 1 / [log10(Glucose) + log10(Insulin)]
    const quicki = 1 / (Math.log10(glucose) + Math.log10(insulin));
    
    document.getElementById('hc-qi-value').innerText = quicki.toFixed(4).toLocaleString('tr-TR');

    const interp = document.getElementById('hc-qi-interp');
    if (quicki >= 0.35) {
        interp.innerText = 'SAĞLIKLI: İnsülin duyarlılığınız normal.';
        interp.style.backgroundColor = '#e8f5e9';
        interp.style.color = '#2e7d32';
    } else if (quicki >= 0.32) {
        interp.innerText = 'DÜŞÜK DUYARLILIK: Hafif insülin direnci olabilir.';
        interp.style.backgroundColor = '#fff3e0';
        interp.style.color = '#ef6c00';
    } else {
        interp.innerText = 'RİSKLİ: Belirgin insülin direnci göstergesi.';
        interp.style.backgroundColor = '#ffebee';
        interp.style.color = '#c62828';
    }

    document.getElementById('hc-quicki-result').classList.add('visible');
}
