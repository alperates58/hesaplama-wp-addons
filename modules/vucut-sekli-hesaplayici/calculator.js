function hcShapeHesapla() {
    const bust = parseFloat(document.getElementById('hc-shape-bust').value);
    const waist = parseFloat(document.getElementById('hc-shape-waist').value);
    const hip = parseFloat(document.getElementById('hc-shape-hip').value);

    if (isNaN(bust) || isNaN(waist) || isNaN(hip)) {
        alert('Lütfen tüm ölçüleri giriniz.');
        return;
    }

    let shape = '';
    let desc = '';

    // Simplified Body Shape Logic (cm to inch conversion not needed if using ratios/differences)
    const bustHipDiff = bust - hip;
    const hipBustDiff = hip - bust;
    const bustWaistDiff = bust - waist;
    const hipWaistDiff = hip - waist;

    if (Math.abs(bustHipDiff) <= 5 && bustWaistDiff >= 20 && hipWaistDiff >= 20) {
        shape = 'Kum Saati (Hourglass)';
        desc = 'Omuzlar ve kalçalar dengeli, bel belirgin şekilde incedir.';
    } else if (hipBustDiff >= 10) {
        shape = 'Armut (Pear / Triangle)';
        desc = 'Kalçalar omuzlardan daha geniştir, vücut ağırlığı alt kısımda toplanır.';
    } else if (bustHipDiff >= 10) {
        shape = 'Ters Üçgen (Inverted Triangle)';
        desc = 'Omuzlar veya göğüs kısmı kalçalardan belirgin şekilde daha geniştir.';
    } else if (Math.abs(bustHipDiff) < 10 && Math.abs(bustWaistDiff) < 20) {
        shape = 'Dikdörtgen (Rectangle)';
        desc = 'Omuz, bel ve kalça ölçüleri birbirine yakındır, bel kıvrımı azdır.';
    } else if (waist >= bust && waist >= hip) {
        shape = 'Elma (Apple / Oval)';
        desc = 'Vücut ağırlığı orta kısımda (bel bölgesinde) toplanmıştır.';
    } else {
        shape = 'Karışık / Atletik';
        desc = 'Ölçüleriniz standart kategorilerin bir karışımıdır.';
    }

    document.getElementById('hc-res-shape-val').innerText = shape;
    document.getElementById('hc-res-shape-desc').innerText = desc;
    document.getElementById('hc-shape-result').classList.add('visible');
}
