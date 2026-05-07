function hcFfmiHesapla() {
    const boyCm = parseFloat(document.getElementById('hc-ffmi-boy').value);
    const boyM = boyCm / 100;
    const kilo = parseFloat(document.getElementById('hc-ffmi-kilo').value);
    const fatPerc = parseFloat(document.getElementById('hc-ffmi-fat').value);

    if (isNaN(boyM) || isNaN(kilo) || isNaN(fatPerc) || boyM <= 0) {
        alert('Lütfen tüm değerleri doğru giriniz.');
        return;
    }

    const leanBodyMass = kilo * (1 - (fatPerc / 100));
    const ffmiRaw = leanBodyMass / (boyM * boyM);
    
    // Adjusted FFMI (normalized to 1.8m height)
    const ffmiAdj = ffmiRaw + 6.0 * (boyM - 1.8);

    document.getElementById('hc-res-ffmi-raw').innerText = ffmiRaw.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-res-ffmi-adj').innerText = ffmiAdj.toLocaleString('tr-TR', { maximumFractionDigits: 2 });

    let cat = '';
    if (ffmiAdj < 18) cat = 'Ortalama Altı';
    else if (ffmiAdj < 20) cat = 'Ortalama';
    else if (ffmiAdj < 22) cat = 'Ortalama Üstü';
    else if (ffmiAdj < 23) cat = 'Mükemmel';
    else if (ffmiAdj < 26) cat = 'Üst Düzey / Profesyonel';
    else cat = 'Olağanüstü (Doğal Sınır Üstü)';

    document.getElementById('hc-res-ffmi-cat').innerText = cat;
    document.getElementById('hc-ffmi-result').classList.add('visible');
    document.getElementById('hc-ffmi-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
