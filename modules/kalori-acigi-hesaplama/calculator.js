function hcKaloriAcigiHesapla() {
    const cinsiyet = document.getElementById('hc-ka-cinsiyet').value;
    const yas = parseFloat(document.getElementById('hc-ka-yas').value);
    const boy = parseFloat(document.getElementById('hc-ka-boy').value);
    const kilo = parseFloat(document.getElementById('hc-ka-kilo').value);
    const aktivite = parseFloat(document.getElementById('hc-ka-aktivite').value);
    const hedefHaftalikKilo = parseFloat(document.getElementById('hc-ka-hedef').value);

    if (!yas || !boy || !kilo) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Mifflin-St Jeor BMR
    let bmr;
    if (cinsiyet === 'erkek') {
        bmr = (10 * kilo) + (6.25 * boy) - (5 * yas) + 5;
    } else {
        bmr = (10 * kilo) + (6.25 * boy) - (5 * yas) - 161;
    }

    const tdee = bmr * aktivite;
    
    // 1 kg yağ yaklaşık 7700 kcal'dir.
    // Günlük açık = (Haftalık Hedef * 7700) / 7
    const gunlukAcik = (hedefHaftalikKilo * 7700) / 7;
    const hedefKalori = tdee - gunlukAcik;

    document.getElementById('hc-ka-tdee').innerText = Math.round(tdee).toLocaleString('tr-TR') + ' kcal';
    document.getElementById('hc-ka-deficit').innerText = Math.round(gunlukAcik).toLocaleString('tr-TR') + ' kcal';
    document.getElementById('hc-ka-target').innerText = Math.round(hedefKalori).toLocaleString('tr-TR') + ' kcal';

    const warning = document.getElementById('hc-ka-warning');
    if ((cinsiyet === 'kadin' && hedefKalori < 1200) || (cinsiyet === 'erkek' && hedefKalori < 1500)) {
        warning.style.display = 'block';
    } else {
        warning.style.display = 'none';
    }

    document.getElementById('hc-kalori-acigi-result').classList.add('visible');
}
