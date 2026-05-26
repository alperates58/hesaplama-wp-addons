function hcYumUlkeDegisti() {
    var ulke = document.getElementById('hc-yum-ulke').value;
    var inputHarc = document.getElementById('hc-yum-harc');
    var inputKira = document.getElementById('hc-yum-kira');
    var inputYasam = document.getElementById('hc-yum-yasam');

    if (ulke === 'usd') {
        inputHarc.value = '25000';
        inputKira.value = '1000';
        inputYasam.value = '600';
    } else if (ulke === 'gbp') {
        inputHarc.value = '18000';
        inputKira.value = '850';
        inputYasam.value = '500';
    } else if (ulke === 'eur') {
        inputHarc.value = '5000'; // AB devlet okulları harçsız veya düşük harçlı
        inputKira.value = '750';
        inputYasam.value = '450';
    } else if (ulke === 'cad') {
        inputHarc.value = '22000';
        inputKira.value = '1200';
        inputYasam.value = '700';
    }
}

function hcYumHesapla() {
    var selectUlke = document.getElementById('hc-yum-ulke');
    var ulke = selectUlke.value;
    var kur = parseFloat(selectUlke.options[selectUlke.selectedIndex].getAttribute('data-rate')) || 45.0;

    var harc = parseFloat(document.getElementById('hc-yum-harc').value) || 0;
    var kira = parseFloat(document.getElementById('hc-yum-kira').value) || 0;
    var yasam = parseFloat(document.getElementById('hc-yum-yasam').value) || 0;
    var sure = parseInt(document.getElementById('hc-yum-sure').value) || 4;

    var sembol = '$';
    if (ulke === 'gbp') sembol = '£';
    if (ulke === 'eur') sembol = '€';

    // Yıllık yaşam gideri = (kira * 12) + (yasam * 12)
    var yillikYasam = (kira * 12) + (yasam * 12);
    var yillikToplamDoviz = harc + yillikYasam;
    var yillikToplamTl = yillikToplamDoviz * kur;

    var genelToplamDoviz = yillikToplamDoviz * sure;
    var genelToplamTl = genelToplamDoviz * kur;

    document.getElementById('hc-yum-res-yillik-doviz').innerText = sembol + yillikToplamDoviz.toLocaleString('tr-TR', {maximumFractionDigits: 0});
    document.getElementById('hc-yum-res-yillik-tl').innerText = yillikToplamTl.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' ₺';
    document.getElementById('hc-yum-res-top-doviz').innerText = sembol + genelToplamDoviz.toLocaleString('tr-TR', {maximumFractionDigits: 0});
    document.getElementById('hc-yum-res-top-tl').innerText = genelToplamTl.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' ₺';

    document.getElementById('hc-yum-result').classList.add('visible');
}