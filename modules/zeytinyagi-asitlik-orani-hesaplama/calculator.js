function hcOliveOilAcidityHesapla() {
    const acidity = parseFloat(document.getElementById('hc-oa-val').value);

    if (isNaN(acidity) || acidity < 0) {
        alert('Lütfen geçerli bir asitlik oranı giriniz.');
        return;
    }

    let grade = '';
    let info = '';

    if (acidity <= 0.8) {
        grade = 'Natürel Sızma';
        info = 'En kaliteli ve en doğal zeytinyağı sınıfıdır. Çiğ tüketime uygundur.';
    } else if (acidity <= 2.0) {
        grade = 'Natürel Birinci';
        info = 'Doğrudan tüketime uygundur, yemeklerde kullanılabilir.';
    } else if (acidity <= 3.3) {
        grade = 'Natürel İkinci';
        info = 'Kızartmalarda ve sıcak yemeklerde kullanımı yaygındır.';
    } else {
        grade = 'Lampant (Rafinelik)';
        info = 'Doğrudan tüketime uygun değildir, rafine edilmesi gerekir.';
    }

    document.getElementById('hc-oa-res').innerText = grade;
    document.getElementById('hc-oa-info').innerText = `Asitlik: %${acidity.toFixed(1)}. ${info}`;
    document.getElementById('hc-olive-acidity-result').classList.add('visible');
}
