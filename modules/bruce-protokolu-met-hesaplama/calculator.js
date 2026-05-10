function hcBruceMetHesapla() {
    const time = parseFloat(document.getElementById('hc-bm-time').value);
    const gender = document.getElementById('hc-bm-gender').value;

    if (!time) {
        alert('Lütfen test süresini giriniz.');
        return;
    }

    let vo2max = 0;
    if (gender === 'male') {
        // Men: VO2max = 14.8 - (1.379 * T) + (0.451 * T^2) - (0.012 * T^3)
        vo2max = 14.8 - (1.379 * time) + (0.451 * Math.pow(time, 2)) - (0.012 * Math.pow(time, 3));
    } else {
        // Women: VO2max = 4.38 * T - 3.9
        vo2max = 4.38 * time - 3.9;
    }

    const met = vo2max / 3.5;

    document.getElementById('hc-bm-res-met').innerText = met.toFixed(1).toLocaleString('tr-TR');
    document.getElementById('hc-bm-res-vo2').innerText = vo2max.toFixed(2).toLocaleString('tr-TR');

    document.getElementById('hc-bruce-met-result').classList.add('visible');
}
