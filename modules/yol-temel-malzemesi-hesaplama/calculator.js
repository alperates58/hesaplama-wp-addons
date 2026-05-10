function hcRoadBaseHesapla() {
    const L = parseFloat(document.getElementById('hc-rb-length').value);
    const W = parseFloat(document.getElementById('hc-rb-width').value);
    const T = parseFloat(document.getElementById('hc-rb-thick').value);

    if (!L || !W || !T) {
        alert('Lütfen tüm ölçüleri giriniz.');
        return;
    }

    const volM3 = L * W * (T / 100);
    const tonnage = volM3 * 2.1; // Standard road base density compressed

    const resVal = document.getElementById('hc-rb-res-val');
    resVal.innerText = Math.round(tonnage).toLocaleString('tr-TR');

    document.getElementById('hc-road-base-result').classList.add('visible');
}
