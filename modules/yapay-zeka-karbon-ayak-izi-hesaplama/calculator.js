function hcYzkGpuDegisti() {
    var gpu = document.getElementById('hc-yzk-gpu').value;
    var customDiv = document.getElementById('hc-yzk-custom-watt-gr');
    if (gpu === 'custom') {
        customDiv.style.display = 'block';
    } else {
        customDiv.style.display = 'none';
    }
}

function hcYapayZekaKarbonAyakIziHesapla() {
    var gpu = document.getElementById('hc-yzk-gpu').value;
    var adet = parseFloat(document.getElementById('hc-yzk-gpu-adet').value);
    var saat = parseFloat(document.getElementById('hc-yzk-saat').value);
    var pue = parseFloat(document.getElementById('hc-yzk-pue').value);
    var intensity = parseFloat(document.getElementById('hc-yzk-sebeke').value); // g CO2/kWh

    if (isNaN(adet) || adet <= 0 || isNaN(saat) || saat <= 0) {
        alert('Lütfen GPU adedi ve çalışma süresini geçerli girin.');
        return;
    }
    if (isNaN(pue) || pue < 1.0) {
        alert('PUE değeri 1.0 veya daha büyük olmalıdır.');
        return;
    }

    var watt = 700;
    if (gpu === 'H100') watt = 700;
    else if (gpu === 'A100') watt = 400;
    else if (gpu === 'L40S') watt = 350;
    else if (gpu === 'RTX4090') watt = 450;
    else {
        watt = parseFloat(document.getElementById('hc-yzk-custom-watt').value) || 250;
    }

    // Toplam Enerji = (Watt * Adet * Saat / 1000) * PUE
    var enerjiKwh = ((watt * adet * saat) / 1000) * pue;

    // Emisyon = Enerji (kWh) * gCO2e/kWh / 1000 = kg CO2e
    var co2Kg = (enerjiKwh * intensity) / 1000;

    // 1 ağaç yılda ~22 kg CO2 emer. 
    // Eğitim süresi boyunca salınan gazı nötrlemek için gereken yıllık ağaç eşdeğeri
    var agaclar = co2Kg / 22;

    // Benzinli otomobil km başı ~0.12 kg CO2 üretir.
    var kmArac = co2Kg / 0.12;

    var fmtSayi = function(val, dec) {
        return val.toLocaleString('tr-TR', { minimumFractionDigits: dec, maximumFractionDigits: dec });
    };

    document.getElementById('hc-yzk-res-enerji').textContent = fmtSayi(enerjiKwh, 1) + ' kWh';
    
    var karbonText = fmtSayi(co2Kg, 2) + ' kg CO₂e';
    if (co2Kg >= 1000) {
        karbonText += ' (' + fmtSayi(co2Kg / 1000, 2) + ' ton CO₂e)';
    }
    document.getElementById('hc-yzk-res-karbon').textContent = karbonText;

    document.getElementById('hc-yzk-res-agac').textContent = fmtSayi(Math.ceil(agaclar), 0) + ' ağacın 1 yıllık emilimi';
    document.getElementById('hc-yzk-res-arac').textContent = fmtSayi(Math.round(kmArac), 0) + ' km sürüş';

    document.getElementById('hc-yapay-zeka-karbon-result').classList.add('visible');
}
