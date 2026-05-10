function hcBenchPressMaksimumAgirlikHesapla() {
    const weight = parseFloat(document.getElementById('hc-bench-weight').value);
    const reps = parseInt(document.getElementById('hc-bench-reps').value);

    if (!weight || !reps) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Epley Formülü: 1RM = Weight * (1 + 0.0333 * Reps)
    const oneRM = weight * (1 + 0.0333 * reps);

    document.getElementById('hc-bench-val').innerText = oneRM.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kg';
    
    let info = "Bench Press için 1RM tahminidir. Gerçek deneme yaparken mutlaka bir 'spotter' (yardımcı) bulundurun.";
    document.getElementById('hc-bench-info').innerText = info;

    document.getElementById('hc-bench-result').classList.add('visible');
}
