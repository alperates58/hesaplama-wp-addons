function hcSurfVolHesapla() {
    const weight = parseFloat(document.getElementById('hc-sv-weight').value);
    const level = parseFloat(document.getElementById('hc-sv-level').value);

    if (!weight) {
        alert('Lütfen ağırlığınızı giriniz.');
        return;
    }

    // Guild Factor: Lite / Weight
    // Beginners need ~1.0-1.2, Intermediate ~0.6-0.8, Advanced ~0.35-0.45
    const volume = weight * level;

    const resVal = document.getElementById('hc-sv-res-val');
    resVal.innerText = Math.round(volume);

    document.getElementById('hc-surf-vol-result').classList.add('visible');
}
