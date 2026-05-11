function hcBoruDebisiHesapla() {
    const capMm = parseFloat(document.getElementById('hc-bd-cap').value);
    const hiz = parseFloat(document.getElementById('hc-bd-hiz').value);

    if (isNaN(capMm) || isNaN(hiz)) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const capMetre = capMm / 1000;
    const alan = (Math.PI * Math.pow(capMetre, 2)) / 4;
    const debiSaniye = alan * hiz; // m3/s
    const debiSaat = debiSaniye * 3600;
    const debiLitreSaniye = debiSaniye * 1000;

    document.getElementById('hc-bd-res-m3h').innerText = debiSaat.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m³/saat';
    document.getElementById('hc-bd-res-ls').innerText = debiLitreSaniye.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' L/sn';
    
    document.getElementById('hc-bd-result').classList.add('visible');
}
