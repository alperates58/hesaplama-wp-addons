function hcPalHesapla() {
    const pal = parseFloat(document.querySelector('input[name="hc-pal"]:checked').value);
    const bmr = parseFloat(document.getElementById('hc-bmr-val').value);

    document.getElementById('hc-res-pal-val').innerText = pal.toLocaleString('tr-TR', { minimumFractionDigits: 3 });

    const tdeeBox = document.getElementById('hc-res-tdee-box');
    if (!isNaN(bmr) && bmr > 0) {
        const tdee = bmr * pal;
        document.getElementById('hc-res-tdee-val').innerText = Math.round(tdee).toLocaleString('tr-TR');
        tdeeBox.style.display = 'block';
    } else {
        tdeeBox.style.display = 'none';
    }

    document.getElementById('hc-pal-result').classList.add('visible');
    document.getElementById('hc-pal-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
