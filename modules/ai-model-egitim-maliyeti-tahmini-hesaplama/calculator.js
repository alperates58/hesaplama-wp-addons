(function() {
    fetch('https://v6.exchangerate-api.com/v6/ddf43dc83228f324754d8335/pair/USD/TRY')
        .then(function(res) { return res.json(); })
        .then(function(veri) {
            if (veri && veri.result === 'success' && veri.conversion_rate) {
                var el = document.getElementById('hc-met-dolar');
                if (el) el.value = parseFloat(veri.conversion_rate).toFixed(2);
            }
        })
        .catch(function() {
            // fallback stays 36.00
        });
})();

function hcMetGpuDegisti() {
    var gpu = document.getElementById('hc-met-gpu-tip').value;
    var customDiv = document.getElementById('hc-met-custom-tflops-gr');
    var priceInput = document.getElementById('hc-met-gpu-fiyat');

    if (gpu === 'custom') {
        customDiv.style.display = 'block';
    } else {
        customDiv.style.display = 'none';
        
        // Default bulut saatlik kira fiyatlarını güncelle
        if (gpu === 'H100') priceInput.value = '2.20';
        else if (gpu === 'A100') priceInput.value = '1.20';
        else if (gpu === 'L40S') priceInput.value = '1.00';
        else if (gpu === 'RTX4090') priceInput.value = '0.30';
    }
}

function hcAiModelEgitimMaliyetiTahminiHesapla() {
    var parametre = parseFloat(document.getElementById('hc-met-parametre').value); // B
    var token = parseFloat(document.getElementById('hc-met-token').value); // B
    var gpu = document.getElementById('hc-met-gpu-tip').value;
    var price = parseFloat(document.getElementById('hc-met-gpu-fiyat').value);
    var mfu = parseFloat(document.getElementById('hc-met-mfu').value) / 100;
    var dolar = parseFloat(document.getElementById('hc-met-dolar').value) || 36.00;

    if (!parametre || parametre <= 0 || !token || token <= 0) {
        alert('Lütfen parametre ve token boyutlarını sıfırdan büyük girin.');
        return;
    }
    if (isNaN(price) || price <= 0 || isNaN(mfu) || mfu <= 0 || mfu > 1) {
        alert('Lütfen geçerli fiyat ve verimlilik (MFU) oranları girin.');
        return;
    }

    var tflops = 1000;
    if (gpu === 'H100') tflops = 989;
    else if (gpu === 'A100') tflops = 312;
    else if (gpu === 'L40S') tflops = 366;
    else if (gpu === 'RTX4090') tflops = 83;
    else {
        tflops = parseFloat(document.getElementById('hc-met-custom-tflops').value) || 100;
    }

    // Toplam FLOPs = 6 * Parametre(10^9) * Token(10^9)
    var totalFlops = 6 * (parametre * 1e9) * (token * 1e9);

    // FP16/BF16 dense TFLOPS = tflops * 10^12
    // GPU'nun verimlilikle saniyede ürettiği FLOPs = tflops * 10^12 * mfu
    // Saatlik üretilen FLOPs = saniyedeki * 3600
    var flopsPerGpuHour = tflops * 1e12 * mfu * 3600;

    var totalGpuHours = totalFlops / flopsPerGpuHour;
    var totalCostUsd = totalGpuHours * price;
    var totalCostTry = totalCostUsd * dolar;

    // 100 GPU ile gün cinsinden eğitim süresi
    var daysWith100Gpu = totalGpuHours / (100 * 24);

    var fmtSayi = function(val, dec) {
        return val.toLocaleString('tr-TR', { minimumFractionDigits: dec, maximumFractionDigits: dec });
    };

    // Büyük FLOPs sayısını E notation yerine anlamlı bilimsel ve Türkçe kelimeli formatlama
    var flopsFormatted = '';
    if (totalFlops >= 1e24) {
        flopsFormatted = fmtSayi(totalFlops / 1e24, 2) + ' YottaFLOP (10²⁴)';
    } else if (totalFlops >= 1e21) {
        flopsFormatted = fmtSayi(totalFlops / 1e21, 2) + ' ZettaFLOP (10²¹)';
    } else if (totalFlops >= 1e18) {
        flopsFormatted = fmtSayi(totalFlops / 1e18, 2) + ' ExaFLOP (10¹⁸)';
    } else if (totalFlops >= 1e15) {
        flopsFormatted = fmtSayi(totalFlops / 1e15, 2) + ' PetaFLOP (10¹⁵)';
    } else {
        flopsFormatted = totalFlops.toExponential(2) + ' FLOP';
    }

    document.getElementById('hc-met-res-flops').textContent = flopsFormatted;
    document.getElementById('hc-met-res-gpu-saat').textContent = fmtSayi(totalGpuHours, 0) + ' saat';
    document.getElementById('hc-met-res-sure-100').textContent = fmtSayi(daysWith100Gpu, 1) + ' gün';
    document.getElementById('hc-met-res-maliyet-usd').textContent = '$' + fmtSayi(totalCostUsd, 2);
    document.getElementById('hc-met-res-maliyet-try').textContent = fmtSayi(totalCostTry, 2) + ' ₺';

    document.getElementById('hc-ai-model-egitim-result').classList.add('visible');
}
