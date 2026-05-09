function hcLbmHesapla() {
    const gender = document.querySelector('input[name="hc-lbm-gender"]:checked').value;
    const boy = parseFloat(document.getElementById('hc-lbm-boy').value);
    const kilo = parseFloat(document.getElementById('hc-lbm-kilo').value);

    if (isNaN(boy) || isNaN(kilo) || boy <= 0 || kilo <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // Boer Formülü
    let lbm = 0;
    if (gender === 'male') {
        lbm = (0.407 * kilo) + (0.267 * boy) - 19.2;
    } else {
        lbm = (0.252 * kilo) + (0.473 * boy) - 48.3;
    }

    const fatMass = kilo - lbm;
    const fatPerc = (fatMass / kilo) * 100;

    document.getElementById('hc-res-lbm-val').innerText = lbm.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    document.getElementById('hc-res-lbm-info').innerText = `Tahmini Yağ Oranı: %${fatPerc.toFixed(1)}`;

    document.getElementById('hc-lbm-result').classList.add('visible');
}
