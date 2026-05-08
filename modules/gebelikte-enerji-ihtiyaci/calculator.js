function hcPregEnerjiHesapla() {
    const w = parseFloat(document.getElementById('hc-ge-w').value);
    const h = parseFloat(document.getElementById('hc-ge-h').value);
    const a = parseFloat(document.getElementById('hc-ge-a').value);
    const extra = parseInt(document.getElementById('hc-ge-trim').value);

    if (isNaN(w) || isNaN(h) || isNaN(a)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Mifflin-St Jeor (Female): (10 * weight) + (6.25 * height) - (5 * age) - 161
    const bmr = (10 * w) + (6.25 * h) - (5 * a) - 161;
    // Activity factor (light): 1.375
    const maintenance = bmr * 1.375;
    const total = maintenance + extra;

    document.getElementById('hc-ge-val').innerText = Math.round(total).toLocaleString('tr-TR') + " kcal";
    
    if (extra === 0) {
        document.getElementById('hc-ge-extra').innerText = "1. Trimesterde ek kalori alımı genellikle gerekmez.";
    } else {
        document.getElementById('hc-ge-extra').innerText = `Hamileliğin bu döneminde normal ihtiyacınıza ek olarak günlük +${extra} kcal önerilir.`;
    }

    document.getElementById('hc-preg-energy-result').classList.add('visible');
}
