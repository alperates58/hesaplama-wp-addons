function hcDailyPocketHesapla() {
    var sehirKatsayi = parseFloat(document.getElementById('hc-sgh-sehir').value) || 1.0;
    var stil = document.getElementById('hc-sgh-stil').value;
    var gun = parseInt(document.getElementById('hc-sgh-gun').value) || 1;

    // Baz günlük harçlık €/$ cinsinden
    var bazHarc = 40;
    if (stil === 'medium') bazHarc = 100;
    else if (stil === 'luxury') bazHarc = 250;

    var gunlukDoviz = bazHarc * sehirKatsayi;
    var toplamDoviz = gunlukDoviz * gun;

    // Döviz cinsi tahmini
    var sembol = '€ / $';

    document.getElementById('hc-sgh-res-gunluk').innerText = gunlukDoviz.toFixed(0) + ' ' + sembol;
    document.getElementById('hc-sgh-res-toplam').innerText = toplamDoviz.toFixed(0) + ' ' + sembol;

    document.getElementById('hc-sgh-result').classList.add('visible');
}