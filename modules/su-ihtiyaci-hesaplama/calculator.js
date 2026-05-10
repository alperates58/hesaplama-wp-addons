function hcSuİhtiyacıHesapla() {
    const weight = parseFloat(document.getElementById('hc-wn-weight').value);
    const activity = parseFloat(document.getElementById('hc-wn-activity').value);

    if (!weight) return;

    // Temel formül: kg * 0.033 L
    // Egzersiz için her 30 dk için ~350ml eklenir.
    let base = weight * 0.033;
    let extra = (activity / 30) * 0.35;
    
    const total = base + extra;

    document.getElementById('hc-wn-val').innerText = total.toFixed(1) + ' Litre';
    document.getElementById('hc-wn-result').classList.add('visible');
}
