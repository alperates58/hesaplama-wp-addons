function hcIcraVekaletHesapla() {
    var tutar = parseFloat(document.getElementById('hc-ivu-tutar').value) || 0;

    if (tutar <= 0) {
        alert('Lütfen icra takip tutarını giriniz.');
        return;
    }

    // 2025-2026 AAÜT Kademeli Nispi Oranlar
    var brackets = [
        { limit: 600000, rate: 0.16 },
        { limit: 600000, rate: 0.15 },
        { limit: 1200000, rate: 0.14 },
        { limit: 1200000, rate: 0.13 },
        { limit: 1800000, rate: 0.11 },
        { limit: 2400000, rate: 0.08 },
        { limit: 3000000, rate: 0.05 },
        { limit: 3600000, rate: 0.03 },
        { limit: 4200000, rate: 0.02 },
        { limit: Infinity, rate: 0.01 }
    ];

    var vekaletUcreti = 0;
    var tempTutar = tutar;

    for (var i = 0; i < brackets.length; i++) {
        var currentLimit = brackets[i].limit;
        var currentRate = brackets[i].rate;

        if (tempTutar > currentLimit) {
            vekaletUcreti += currentLimit * currentRate;
            tempTutar -= currentLimit;
        } else {
            vekaletUcreti += tempTutar * currentRate;
            break;
        }
    }

    // 2025-2026 AAÜT Maktu Alt Sınırı: 9.000 TL
    // İcra dairelerinde vekalet ücreti asgari maktu ücretten az olamaz. Ancak borç tutarını aşamaz.
    var maktuAltSinir = 9000;
    if (vekaletUcreti < maktuAltSinir) {
        vekaletUcreti = maktuAltSinir;
    }
    if (vekaletUcreti > tutar) {
        vekaletUcreti = tutar; // Vekalet ücreti borç miktarını geçemez
    }

    document.getElementById('hc-ivu-val').innerText = Math.round(vekaletUcreti).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-ivu-result').classList.add('visible');
}