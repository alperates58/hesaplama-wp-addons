function hcMrrHesapla() {
    const v = parseFloat(document.getElementById('hc-mrr-v').value) || 0;
    const f = parseFloat(document.getElementById('hc-mrr-f').value) || 0;
    const d = parseFloat(document.getElementById('hc-mrr-d').value) || 0;

    // MRR = v (m/min) * f (mm/rev) * d (mm)
    // Conversion: v * 1000 (mm/min) * f * d = mm³/min
    // mm³/min / 1000 = cm³/min
    const mrr = v * f * d; // The factor 1000 cancels out with cm3 conversion

    document.getElementById('hc-res-mrr-val').innerText = mrr.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' cm³/dk';
    document.getElementById('hc-mrr-result').classList.add('visible');
}
