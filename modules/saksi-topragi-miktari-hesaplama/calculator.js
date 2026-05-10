function hcPotSoilHesapla() {
    const type = document.getElementById('hc-ps-type').value;
    const dia = parseFloat(document.getElementById('hc-ps-dia').value);
    const h = parseFloat(document.getElementById('hc-ps-height').value);

    if (!dia || !h) {
        alert('Lütfen saksı boyutlarını giriniz.');
        return;
    }

    let volumeCm3 = 0;
    if (type === 'cylinder') {
        // V = PI * r^2 * h
        const r = dia / 2;
        volumeCm3 = Math.PI * Math.pow(r, 2) * h;
    } else {
        // Kare/Dikdörtgen saksı varsayımı (genişlik=dia)
        volumeCm3 = dia * dia * h;
    }

    // 1000 cm3 = 1 Litre
    const liters = volumeCm3 / 1000;

    const resVal = document.getElementById('hc-ps-res-val');
    resVal.innerText = liters.toFixed(1).toLocaleString('tr-TR');

    document.getElementById('hc-pot-soil-result').classList.add('visible');
}
