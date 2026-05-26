function hcMiningElektrikMaliyetiHesapla() {
    var guc = parseFloat(document.getElementById('hc-mem-guc').value) || 0;
    var saat = parseFloat(document.getElementById('hc-mem-saat').value) || 0;
    var kwhTarifesi = parseFloat(document.getElementById('hc-mem-kWh').value) || 0;

    if (guc <= 0 || saat <= 0 || saat > 24) {
        alert('Lütfen geçerli güç ve çalışma saati giriniz (maksimum 24 saat).');
        return;
    }

    var gunlukKwh = (guc * saat) / 1000;
    var gunlukTutar = gunlukKwh * kwhTarifesi;

    var fillRows = function(prefix, days) {
        var kwh = gunlukKwh * days;
        var tutar = gunlukTutar * days;

        document.getElementById('hc-mem-res-' + prefix + '-kwh').innerText = kwh.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' kWh';
        document.getElementById('hc-mem-res-' + prefix + '-tutar').innerText = tutar.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    };

    fillRows('gun', 1);
    fillRows('ay', 30);
    fillRows('yil', 365);

    document.getElementById('hc-mem-result').classList.add('visible');
}