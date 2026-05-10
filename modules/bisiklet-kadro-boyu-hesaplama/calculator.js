function hcBisikletKadroBoyuHesapla() {
    const inseam = parseFloat(document.getElementById('hc-inseam').value);
    const type = document.getElementById('hc-bike-type').value;

    if (!inseam) {
        alert('Lütfen iç bacak boyunuzu girin.');
        return;
    }

    let size = "";
    let info = "";

    if (type === 'road') {
        size = (inseam * 0.665).toFixed(1) + " cm";
        info = "Yol bisikletlerinde kadro boyu genellikle cm cinsinden ifade edilir.";
    } else if (type === 'mountain') {
        const sizeCm = (inseam * 0.67) - 10;
        const sizeInch = (sizeCm / 2.54).toFixed(1);
        size = sizeInch + " inç (" + Math.round(sizeCm) + " cm)";
        info = "Dağ bisikletlerinde kadro boyu genellikle inç cinsinden ifade edilir.";
    } else {
        size = (inseam * 0.685).toFixed(1) + " cm";
        info = "Şehir bisikletlerinde daha dik bir oturuş pozisyonu için biraz daha büyük kadro tercih edilebilir.";
    }

    document.getElementById('hc-frame-val').innerText = size;
    document.getElementById('hc-frame-info').innerText = info;
    document.getElementById('hc-frame-result').classList.add('visible');
}
