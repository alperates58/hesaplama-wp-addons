function hcBoneMassHesapla() {
    const weight = parseFloat(document.getElementById('hc-bm-weight').value);

    if (!weight) return;

    // Statistical average: Bone mass is approx 3-5% of body weight for adults
    const boneMass = weight * 0.04;

    document.getElementById('hc-bm-res-val').innerText = boneMass.toFixed(2).toLocaleString('tr-TR');
    document.getElementById('hc-bone-mass-result').classList.add('visible');
}
