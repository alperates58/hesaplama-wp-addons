function hcPppMaasHesapla() {
    var maas = parseFloat(document.getElementById('hc-ppp-maas-val').value) || 0;
    var ulkePPP = parseFloat(document.getElementById('hc-ppp-hedef-ulke').value) || 1.0;
    var trPPP = parseFloat(document.getElementById('hc-ppp-turkiye-ref').value) || 0.38;
    var kur = parseFloat(document.getElementById('hc-ppp-kur').value) || 33.50;

    if (maas <= 0 || trPPP <= 0 || kur <= 0) {
        alert('Lütfen geçerli maaş, katsayı ve kur değerleri giriniz.');
        return;
    }

    var nominalTl = maas * kur;
    // Satın alma gücü paritesi formülü: Nominal * (Hedef Ülke PPP / Türkiye PPP)
    var pppCarpan = ulkePPP / trPPP;
    var refahDegeri = nominalTl * pppCarpan;

    document.getElementById('hc-ppp-res-nominal').innerText = nominalTl.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-ppp-res-refah').innerText = refahDegeri.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-ppp-res-carpan').innerText = pppCarpan.toFixed(2) + 'x';

    document.getElementById('hc-ppp-result').classList.add('visible');
}