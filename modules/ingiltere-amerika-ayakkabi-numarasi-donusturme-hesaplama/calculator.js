function hcİngiltereAmerikaAyakkabıNumarasıDönüştürmeHesapla() {
    const gender = document.getElementById('hc-su-gender').value;
    const system = document.getElementById('hc-su-from').value;
    const val = parseFloat(document.getElementById('hc-su-val').value);

    if (!val) return;

    let eu = 0;

    if (system === 'UK') {
        // UK to EU approx: EU = UK + 33 (adults)
        eu = val + 33;
        if (gender === 'male') eu += 0.5;
    } else {
        // US to EU approx
        if (gender === 'male') {
            eu = val + 32.5;
        } else {
            eu = val + 31;
        }
    }

    document.getElementById('hc-su-res').innerText = Math.round(eu * 2) / 2; // .5 hassasiyet
    document.getElementById('hc-su-result').classList.add('visible');
}
