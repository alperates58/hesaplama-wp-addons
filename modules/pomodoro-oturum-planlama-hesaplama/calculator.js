function hcPomoPlanla() {
    var hedef = parseFloat(document.getElementById('hc-pop-hedef').value) || 0;
    var odak = parseInt(document.getElementById('hc-pop-odak').value) || 25;
    var kisa = parseInt(document.getElementById('hc-pop-kisa').value) || 5;
    var uzun = parseInt(document.getElementById('hc-pop-uzun').value) || 15;
    var frekans = parseInt(document.getElementById('hc-pop-frekans').value) || 4;

    if (hedef <= 0) {
        alert('Lütfen geçerli bir hedef çalışma süresi giriniz.');
        return;
    }

    // Pomodoro seansı sayısını hesapla
    // Hedef çalışma odaklanma süresidir.
    var seansSayisi = Math.ceil(hedef / odak);

    // Molaları hesapla
    var uzunMolaSayisi = Math.floor(seansSayisi / frekans);
    // Eğer tam bölündüyse son seans bitimi uzun mola sayılmayabilir, o yüzden:
    if (seansSayisi % frekans === 0 && uzunMolaSayisi > 0) {
        uzunMolaSayisi -= 1; 
    }
    
    var kisaMolaSayisi = Math.max(0, seansSayisi - 1 - uzunMolaSayisi);

    var toplamMolaSure = (kisaMolaSayisi * kisa) + (uzunMolaSayisi * uzun);
    var netCalisma = seansSayisi * odak;
    var toplamSure = netCalisma + toplamMolaSure;

    document.getElementById('hc-pop-res-seans').innerText = seansSayisi + ' Seans';
    document.getElementById('hc-pop-res-calisma').innerText = netCalisma + ' Dakika';
    document.getElementById('hc-pop-res-mola').innerText = toplamMolaSure + ' Dakika';
    document.getElementById('hc-pop-res-toplam').innerText = toplamSure + ' Dakika (' + (toplamSure/60).toFixed(1) + ' Saat)';

    document.getElementById('hc-pop-result').classList.add('visible');
}