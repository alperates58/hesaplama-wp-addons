function hcBikeFrameHesapla() {
    const inseam = parseFloat(document.getElementById('hc-bf-inseam').value);
    const type = document.getElementById('hc-bf-type').value;

    if (!inseam) {
        alert('Lütfen iç bacak boyunuzu giriniz.');
        return;
    }

    let frameSize = 0;
    let unit = "cm";

    if (type === 'road') {
        frameSize = inseam * 0.665;
        unit = "cm";
    } else if (type === 'mtb') {
        frameSize = (inseam * 0.67 - 10) / 2.54; // Convert to inch
        unit = "inç (L/XL)";
    } else if (type === 'city') {
        frameSize = inseam * 0.685;
        unit = "cm";
    }

    const resVal = document.getElementById('hc-bf-res-val');
    resVal.innerText = frameSize.toFixed(1).toLocaleString('tr-TR');
    document.getElementById('hc-bf-unit').innerText = unit;

    document.getElementById('hc-bike-frame-result').classList.add('visible');
}
