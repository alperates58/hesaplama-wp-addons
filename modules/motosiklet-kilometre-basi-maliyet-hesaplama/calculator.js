function hcMotoKmMaliyetHesapla() {
    var km = parseFloat(document.getElementById('hc-mkbm-km').value) || 0;
    var yakitOrt = parseFloat(document.getElementById('hc-mkbm-yakitort').value) || 3.5;
    var benzin = parseFloat(document.getElementById('hc-mkbm-yakitfiyat').value) || 44.5;
    var bakim = parseFloat(document.getElementById('hc-mkbm-bakim').value) || 0;
    var sabit = parseFloat(document.getElementById('hc-mkbm-sabit').value) || 0;
    var amortisman = parseFloat(document.getElementById('hc-mkbm-amortisman').value) || 0;

    if (km <= 0) {
        alert('Lütfen yıllık kilometre değerini giriniz.');
        return;
    }

    var kmYakit = (yakitOrt / 100) * benzin;
    var kmBakim = bakim / km;
    var kmSabit = sabit / km;
    var kmAmortisman = amortisman / km;

    var toplamKm = kmYakit + kmBakim + kmSabit + kmAmortisman;

    document.getElementById('hc-mkbm-res-yakit').innerText = kmYakit.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-mkbm-res-bakim').innerText = kmBakim.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-mkbm-res-sabit').innerText = kmSabit.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-mkbm-res-amortisman').innerText = kmAmortisman.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-mkbm-res-toplam').innerText = toplamKm.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺ / km';

    document.getElementById('hc-mkbm-result').classList.add('visible');
}