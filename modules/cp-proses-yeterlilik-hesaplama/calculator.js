function hcCpHesapla() {
    const usl = parseFloat(document.getElementById('hc-cp-usl').value);
    const lsl = parseFloat(document.getElementById('hc-cp-lsl').value);
    const sigma = parseFloat(document.getElementById('hc-cp-sigma').value);

    if (isNaN(usl) || isNaN(lsl) || isNaN(sigma) || sigma <= 0) {
        alert('Lütfen tüm alanları doğru ve pozitif standart sapma ile doldurun.');
        return;
    }

    const cp = (usl - lsl) / (6 * sigma);

    document.getElementById('hc-res-cp-val').innerText = cp.toLocaleString('tr-TR', { minimumFractionDigits: 3, maximumFractionDigits: 3 });

    let status = "";
    if (cp >= 1.67) status = "Mükemmel Potansiyel";
    else if (cp >= 1.33) status = "Yeterli Potansiyel";
    else if (cp >= 1.0) status = "Düşük Potansiyel (İyileştirme Gerekli)";
    else status = "Yetersiz Potansiyel (Tolerans Dışı Üretim Kaçınılmaz)";

    document.getElementById('hc-res-cp-status').innerText = status;
    document.getElementById('hc-cp-proses-yeterlilik-hesaplama-result').classList.add('visible');
}
