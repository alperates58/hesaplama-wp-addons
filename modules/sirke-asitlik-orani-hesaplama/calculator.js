function hcSirkeAsitlikHesapla() {
    var numune = parseFloat(document.getElementById('hc-sih-numune').value) || 0;
    var naoh = parseFloat(document.getElementById('hc-sih-naoh').value) || 0;
    var molar = parseFloat(document.getElementById('hc-sih-molar').value) || 0.1;

    if (numune <= 0 || naoh <= 0) {
        alert('Lütfen geçerli numune ve NaOH hacimleri giriniz.');
        return;
    }

    // Asetik asit asitlik yüzdesi formülü:
    // Asitlik (%) = (NaOH Hacmi (ml) * Molarite (M) * 0.06005 (Asetik asit milieşdeğeri) * 100) / Numune Hacmi (ml)
    var asitlik = (naoh * molar * 0.06005 * 100) / numune * 100;

    var kalite = 'Çok Hafif Sirke (Sofra kullanımı için zayıf)';
    if (asitlik >= 5.0) {
        kalite = 'Standart Sirke (Piyasa/Koruyucu Standardı - Asitlik >= %5.0)';
    } else if (asitlik >= 4.0) {
        kalite = 'Sofra/Salata Sirkesi Derecesi (Asitlik %4.0-5.0)';
    }

    document.getElementById('hc-sih-res-asit').innerText = '%' + asitlik.toFixed(2);
    document.getElementById('hc-sih-res-kalite').innerText = kalite;

    document.getElementById('hc-sih-result').classList.add('visible');
}