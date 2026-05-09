function hcHOMAHesapla() {
    const glucose = parseFloat(document.getElementById('hc-homa-glucose').value);
    const insulin = parseFloat(document.getElementById('hc-homa-insulin').value);

    if (isNaN(glucose) || isNaN(insulin)) {
        alert('Lütfen tüm değerleri girin.');
        return;
    }

    const homa = (glucose * insulin) / 405;
    
    document.getElementById('hc-homa-value').innerText = homa.toFixed(2).toLocaleString('tr-TR');

    const interp = document.getElementById('hc-homa-interp');
    if (homa < 2.5) {
        interp.innerText = 'NORMAL: İnsülin direnci saptanmadı.';
        interp.style.backgroundColor = '#e8f5e9';
        interp.style.color = '#2e7d32';
    } else if (homa < 3.0) {
        interp.innerText = 'SINIRDA: İnsülin direnci başlangıcı olabilir.';
        interp.style.backgroundColor = '#fff3e0';
        interp.style.color = '#ef6c00';
    } else {
        interp.innerText = 'İNSÜLİN DİRENCİ: Değerler yüksek seyrediyor.';
        interp.style.backgroundColor = '#ffebee';
        interp.style.color = '#c62828';
    }

    document.getElementById('hc-homa-result').classList.add('visible');
}
