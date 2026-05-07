function hcBmiHesapla() {
    const boyM = parseFloat(document.getElementById('hc-bmi-boy').value) / 100;
    const kilo = parseFloat(document.getElementById('hc-bmi-kilo').value);

    if (isNaN(boyM) || isNaN(kilo) || boyM <= 0) {
        alert('Lütfen boy ve kilo değerlerini giriniz.');
        return;
    }

    const bmi = kilo / (boyM * boyM);
    document.getElementById('hc-res-bmi-val').innerText = bmi.toLocaleString('tr-TR', { maximumFractionDigits: 1 });

    let cat = '';
    let pos = 0; // percentage for pointer

    if (bmi < 18.5) {
        cat = 'Zayıf';
        pos = (bmi / 18.5) * 20; // First 20%
    } else if (bmi < 25) {
        cat = 'Normal';
        pos = 20 + ((bmi - 18.5) / 6.5) * 30; // Next 30%
    } else if (bmi < 30) {
        cat = 'Fazla Kilolu';
        pos = 50 + ((bmi - 25) / 5) * 25; // Next 25%
    } else {
        cat = 'Obez';
        pos = 75 + Math.min(((bmi - 30) / 10) * 25, 25); // Last 25%
    }

    document.getElementById('hc-res-bmi-cat').innerText = cat;
    document.getElementById('hc-bmi-pointer').style.left = `${pos}%`;
    document.getElementById('hc-bmi-result').classList.add('visible');
}
