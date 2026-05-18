function hcSurtunmeFaktoruHesapla() {
    var Re = parseFloat(document.getElementById('hc-sff-re').value);
    var e = parseFloat(document.getElementById('hc-sff-e').value); // mm
    var D = parseFloat(document.getElementById('hc-sff-d').value); // mm

    if (isNaN(Re) || Re <= 0) {
        alert('Lütfen geçerli bir Reynolds Sayısı girin.');
        return;
    }
    if (isNaN(e) || e < 0) {
        alert('Lütfen geçerli bir boru yüzey pürüzlülüğü değeri girin.');
        return;
    }
    if (isNaN(D) || D <= 0) {
        alert('Lütfen geçerli bir boru iç çapı girin.');
        return;
    }

    var f = 0;
    var regime = '';

    if (Re <= 2300) {
        // Laminar flow
        f = 64 / Re;
        regime = 'Laminer Akış (Düzgün Akış)';
    } else if (Re < 4000) {
        // Transitional flow - average of laminar and turbulent approximations
        var fLaminar = 64 / Re;
        var relativeRoughness = e / D;
        var fTurbulent = 0.25 / Math.pow(Math.log10(relativeRoughness / 3.7 + 5.74 / Math.pow(Re, 0.9)), 2);
        // linear interpolation interpolation fraction
        var fraction = (Re - 2300) / 1700;
        f = fLaminar + fraction * (fTurbulent - fLaminar);
        regime = 'Geçiş Bölgesi Akışı';
    } else {
        // Turbulent flow - Swamee-Jain equation (excellent approximation of Colebrook-White)
        var relativeRoughness = e / D;
        var denom = Math.log10(relativeRoughness / 3.7 + 5.74 / Math.pow(Re, 0.9));
        f = 0.25 / Math.pow(denom, 2);
        regime = 'Türbülanslı Akış (Girdaplı Akış)';
    }

    var fFanning = f / 4;

    document.getElementById('hc-sff-res-f').innerText = f.toLocaleString('tr-TR', { maximumFractionDigits: 5 });
    document.getElementById('hc-sff-res-ff').innerText = fFanning.toLocaleString('tr-TR', { maximumFractionDigits: 5 });
    document.getElementById('hc-sff-res-regime').innerText = regime;

    var desc = 'Girdiğiniz parametrelere göre borudaki akış ' + regime + ' rejimindedir. Darcy-Weisbach sürtünme faktörü (f) ' + f.toLocaleString('tr-TR', { maximumFractionDigits: 5 }) + ' olarak bulunmuştur. Bu değer borudaki basınç kaybının ve yük kaybının hesaplanmasında doğrudan kullanılır.';
    document.getElementById('hc-sff-desc').innerText = desc;

    document.getElementById('hc-surtunme-faktoru-hesaplama-result').classList.add('visible');
}
