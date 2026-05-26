function hcMmaGucHesapla() {
    var kilo = parseFloat(document.getElementById('hc-mga-kilo').value) || 0;
    var bench = parseFloat(document.getElementById('hc-mga-bench').value) || 0;
    var squat = parseFloat(document.getElementById('hc-mga-squat').value) || 0;
    var dead = parseFloat(document.getElementById('hc-mga-deadlift').value) || 0;

    if (kilo <= 30) {
        alert('Lütfen geçerli vücut kilonuzu giriniz.');
        return;
    }

    var toplam = bench + squat + dead;
    var oran = toplam / kilo;

    var sinif = 'Başlangıç (Basic)';
    var tavsiye = 'Temel dövüş sporları için yeterli ancak patlayıcı güreş ve kilit mücadeleleri için kuvvet geliştirilmeli.';
    var renk = '#ef4444';

    if (oran >= 5.5) {
        sinif = 'Elit Dövüşçü (Elite)';
        tavsiye = 'Mükemmel güç-ağırlık dengesi. Kafeste rakipleri kontrol etmek ve klinç/güreş üstünlüğü için ideal seviye.';
        renk = 'var(--hc-front-green)';
    } else if (oran >= 4.5) {
        sinif = 'İleri Dövüşçü (Advanced)';
        tavsiye = 'Oldukça kuvvetli. Patlayıcı nakavt gücü ve defansif güreş kapasitesi yüksek.';
        renk = '#22c55e';
    } else if (oran >= 3.0) {
        sinif = 'Orta Seviye (Intermediate)';
        tavsiye = 'Amatör müsabakalar için yeterli güç. Dayanıklılık ve teknikle birleştirilmelidir.';
        renk = '#eab308';
    }

    document.getElementById('hc-mga-res-toplam').innerText = toplam + ' kg';
    document.getElementById('hc-mga-res-oran').innerText = oran.toFixed(2);
    document.getElementById('hc-mga-res-oran').style.color = renk;
    document.getElementById('hc-mga-res-sinif').innerText = sinif;
    document.getElementById('hc-mga-res-tavsiye').innerText = tavsiye;

    document.getElementById('hc-mga-result').classList.add('visible');
}