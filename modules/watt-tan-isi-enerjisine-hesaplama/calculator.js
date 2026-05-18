function hcWattTanIsiHesapla() {
    var W = parseFloat(document.getElementById('hc-wti-power').value);
    var tVal = parseFloat(document.getElementById('hc-wti-time-val').value);
    var tUnit = document.getElementById('hc-wti-time-unit').value;
    var eff = parseFloat(document.getElementById('hc-wti-eff').value);

    if (isNaN(W) || W < 0) {
        alert('Lütfen geçerli bir Watt gücü girin.');
        return;
    }
    if (isNaN(tVal) || tVal < 0) {
        alert('Lütfen geçerli bir süre değeri girin.');
        return;
    }
    if (isNaN(eff) || eff <= 0 || eff > 100) {
        alert('Lütfen 1 ile 100 arasında geçerli bir verimlilik yüzdesi girin.');
        return;
    }

    // Convert time to seconds
    var seconds = tVal;
    var timeStr = tVal.toLocaleString('tr-TR') + ' saniye';
    if (tUnit === 'm') {
        seconds = tVal * 60;
        timeStr = tVal.toLocaleString('tr-TR') + ' dakika';
    } else if (tUnit === 'h') {
        seconds = tVal * 3600;
        timeStr = tVal.toLocaleString('tr-TR') + ' saat';
    }

    // Total energy in Joules: Q = W * t * (eff / 100)
    // 1 Watt = 1 Joule/second
    var J = W * seconds * (eff / 100);

    // Conversions
    var kcal = J * 0.0002388458966;
    var btu = J * 0.00094781712;

    document.getElementById('hc-wti-res-j').innerText = J.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' J';
    document.getElementById('hc-wti-res-kcal').innerText = kcal.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kcal';
    document.getElementById('hc-wti-res-btu').innerText = btu.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' BTU';

    var desc = W.toLocaleString('tr-TR') + ' Watt gücündeki cihaz, %' + eff.toLocaleString('tr-TR') + ' verimle ' + timeStr + ' boyunca çalıştığında tam ' + J.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Joule ısı enerjisi açığa çıkarır. Bu değer termodinamik olarak ' + kcal.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Kilokaloriye (kcal) ve ' + btu.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' BTU ısı enerjisine eşdeğerdir.';
    document.getElementById('hc-wti-desc').innerText = desc;

    document.getElementById('hc-watt-tan-isi-enerjisine-hesaplama-result').classList.add('visible');
}
