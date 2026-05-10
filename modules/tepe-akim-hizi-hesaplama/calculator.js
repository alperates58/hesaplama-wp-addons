function hcTepeAkimHiziHesapla() {
    const gender = document.querySelector('input[name="hc-pef-gender"]:checked').value;
    const age = parseFloat(document.getElementById('hc-pef-age').value);
    const height = parseFloat(document.getElementById('hc-pef-height').value);

    if (isNaN(age) || isNaN(height)) {
        alert('Lütfen yaş ve boy bilgilerini giriniz.');
        return;
    }

    let pef = 0;
    // ERS Normals (approximate regression formulas)
    if (gender === 'male') {
        pef = (((height / 100) * 5.48) + 1.58 - (age * 0.041)) * 60;
    } else {
        pef = (((height / 100) * 3.72) + 2.24 - (age * 0.03)) * 60;
    }

    document.getElementById('hc-pef-res-val').innerText = Math.round(pef).toLocaleString('tr-TR');
    document.getElementById('hc-tepe-akim-hizi-result').classList.add('visible');
}
