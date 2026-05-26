function hcOvmUlkeDegisti() {
    var ulke = document.getElementById('hc-ovm-ulke').value;
    var bloke = document.getElementById('hc-ovm-bloke');
    var harc = document.getElementById('hc-ovm-harc');
    var sigorta = document.getElementById('hc-ovm-sigorta');

    if (ulke === 'almanya') {
        bloke.value = '11904'; // Euro
        harc.value = '75';
        sigorta.value = '150';
    } else if (ulke === 'ingiltere') {
        bloke.value = '12180'; // GBP (London dışı 9 ay için £1,023/ay)
        harc.value = '490';
        sigorta.value = '776'; // IHS Yıllık sağlık prim
    } else if (ulke === 'usa') {
        bloke.value = '20000'; // Ortalama I-20 yaşam teminatı USD
        harc.value = '185'; // F1 harç. + $350 SEVIS fee
        sigorta.value = '1200';
    }
}

function hcOvmHesapla() {
    var ulke = document.getElementById('hc-ovm-ulke').value;
    var bloke = parseFloat(document.getElementById('hc-ovm-bloke').value) || 0;
    var harc = parseFloat(document.getElementById('hc-ovm-harc').value) || 0;
    var sigorta = parseFloat(document.getElementById('hc-ovm-sigorta').value) || 0;

    var kur = 53.4; // eur
    var sembol = '€';
    if (ulke === 'ingiltere') {
        kur = 61.7;
        sembol = '£';
    } else if (ulke === 'usa') {
        kur = 45.9;
        sembol = '$';
    }

    // Toplam vize başvuru proses masrafı (Harç + Sigorta)
    var prosesTl = (harc + sigorta) * kur;
    
    // Gösterilecek bloke hesap / teminat
    var gosterilecekDoviz = bloke;
    var gosterilecekTl = gosterilecekDoviz * kur;

    var detay = '';
    if (ulke === 'almanya') {
        detay = 'Almanya ulusal vizesinde bloke hesap zorunludur. Belirtilen miktar yetkili bankalara (Expatrio, Fintiba vb.) yatırılmalı ve aylık 992 € olarak size geri ödenmelidir.';
    } else if (ulke === 'ingiltere') {
        detay = 'İngiltere vizesinde bloke hesap yerine banka hesabınızda en az 28 gün boyunca bekletilmiş likit bakiye göstermeniz istenir.';
    } else {
        detay = 'ABD F-1 vizesinde I-20 belgesindeki yaşam ve okul ücretini karşılayan miktarın sponsor veya şahsi banka hesabında gösterilmesi şarttır.';
    }

    document.getElementById('hc-ovm-res-proses-tl').innerText = prosesTl.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' ₺';
    document.getElementById('hc-ovm-res-gosterilecek').innerText = sembol + gosterilecekDoviz.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' (' + gosterilecekTl.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' ₺)';
    document.getElementById('hc-ovm-res-detay').innerText = detay;

    document.getElementById('hc-ovm-result').classList.add('visible');
}