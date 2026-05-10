function hcGradeAvgHesapla() {
    const vize = parseFloat(document.getElementById('hc-ga-vize').value);
    const final = parseFloat(document.getElementById('hc-ga-final').value);

    if (isNaN(vize) || isNaN(final)) {
        alert('Lütfen tüm notları giriniz.');
        return;
    }

    const ort = (vize * 0.4) + (final * 0.6);
    const status = ort >= 50 ? 'GEÇTİ' : 'KALDI';
    const statusColor = ort >= 50 ? '#27ae60' : '#e74c3c';

    document.getElementById('hc-ga-res-val').innerText = ort.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    const statusEl = document.getElementById('hc-ga-status');
    statusEl.innerText = status;
    statusEl.style.color = statusColor;
    
    document.getElementById('hc-grade-avg-result').classList.add('visible');
}
