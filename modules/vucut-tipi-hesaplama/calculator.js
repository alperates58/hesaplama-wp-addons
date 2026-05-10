function hcBodyTypeHesapla() {
    const bust = parseFloat(document.getElementById('hc-bt-bust').value);
    const waist = parseFloat(document.getElementById('hc-bt-waist').value);
    const hip = parseFloat(document.getElementById('hc-bt-hip').value);

    if (!bust || !waist || !hip) return;

    const resVal = document.getElementById('hc-bt-res-val');
    const resDesc = document.getElementById('hc-bt-res-desc');

    let type = '';
    let desc = '';

    if ((hip - bust) >= 9) {
        type = 'Armut (Üçgen)';
        desc = 'Kalçalar omuzlardan/göğüsten daha geniştir.';
    } else if ((bust - hip) >= 9) {
        type = 'Ters Üçgen';
        desc = 'Omuzlar/göğüs kalçalardan daha geniştir.';
    } else if (Math.abs(bust - hip) <= 5 && (bust - waist) >= 20) {
        type = 'Kum Saati';
        desc = 'Göğüs ve kalça dengeli, bel oldukça incedir.';
    } else if (Math.abs(bust - hip) <= 5 && (bust - waist) < 20) {
        type = 'Dikdörtgen';
        desc = 'Göğüs, bel ve kalça ölçüleri birbirine yakındır.';
    } else if (waist >= bust && waist >= hip) {
        type = 'Elma (Yuvarlak)';
        desc = 'Vücut ağırlığı orta bölgede toplanmıştır.';
    } else {
        type = 'Karışık / Atletik';
        desc = 'Belirgin bir geometrik tip dışında, dengeli bir dağılım.';
    }

    resVal.innerText = type;
    resDesc.innerText = desc;
    document.getElementById('hc-body-type-result').classList.add('visible');
}
