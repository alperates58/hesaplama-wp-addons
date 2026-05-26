function hcDosHesapla() {
    var selectPara = document.getElementById('hc-dos-para');
    var kur = parseFloat(selectPara.value) || 60.0;
    var sembol = '£';
    if (kur === 53.4) sembol = '€';
    if (kur === 45.9) sembol = '$';

    var hafta = parseInt(document.getElementById('hc-dos-hafta').value) || 0;
    var egitim = parseFloat(document.getElementById('hc-dos-egitim').value) || 0;
    var yurt = parseFloat(document.getElementById('hc-dos-yurt').value) || 0;
    var yasam = parseFloat(document.getElementById('hc-dos-yasam').value) || 0;
    var sabitTl = parseFloat(document.getElementById('hc-dos-sabit').value) || 0;

    if (hafta <= 0) {
        alert('Lütfen geçerli bir hafta sayısı giriniz.');
        return;
    }

    var haftalikDoviz = egitim + yurt + yasam;
    var egitimYasamDoviz = haftalikDoviz * hafta;
    
    var toplamTl = (egitimYasamDoviz * kur) + sabitTl;

    document.getElementById('hc-dos-res-haftalik-doviz').innerText = sembol + haftalikDoviz.toLocaleString('tr-TR', {maximumFractionDigits: 0});
    document.getElementById('hc-dos-res-top-doviz').innerText = sembol + egitimYasamDoviz.toLocaleString('tr-TR', {maximumFractionDigits: 0});
    document.getElementById('hc-dos-res-top-tl').innerText = toplamTl.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' ₺';

    document.getElementById('hc-dos-result').classList.add('visible');
}