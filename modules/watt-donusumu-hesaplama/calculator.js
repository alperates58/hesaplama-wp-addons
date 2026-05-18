function hcWattDonusumuHesapla() {
    var W = parseFloat(document.getElementById('hc-wtd-val').value);

    if (isNaN(W) || W < 0) {
        alert('Lütfen geçerli pozitif bir Watt değeri girin.');
        return;
    }

    var kw = W / 1000;
    var mw = W / 1e6;
    var hpMech = W / 745.699872;  // Mechanical HP
    var hpMet = W / 735.49875;    // Metric HP (PS/BG)
    var btu = W * 3.412141633;    // BTU/hr
    var kcal = W * 0.85984522785899; // kcal/hr
    var dbm = W === 0 ? -Infinity : 10 * Math.log10(W * 1000);

    document.getElementById('hc-wtd-res-kw').innerText = kw.toLocaleString('tr-TR', { maximumFractionDigits: 5 }) + ' kW';
    document.getElementById('hc-wtd-res-mw').innerText = mw.toLocaleString('tr-TR', { maximumFractionDigits: 8 }) + ' MW';
    document.getElementById('hc-wtd-res-hp-mech').innerText = hpMech.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' HP';
    document.getElementById('hc-wtd-res-hp-met').innerText = hpMet.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' PS (BG)';
    document.getElementById('hc-wtd-res-btu').innerText = btu.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' BTU/sa';
    document.getElementById('hc-wtd-res-kcal').innerText = kcal.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kcal/sa';
    document.getElementById('hc-wtd-res-dbm').innerText = dbm === -Infinity ? '-∞ dBm' : dbm.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' dBm';

    var desc = W.toLocaleString('tr-TR') + ' Watt (W) elektriksel veya mekanik güç değeri; mühendislikte ' + kw.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' Kilowatt (kW) güce, otomotiv sektöründe ' + hpMet.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Metrik Beygir Gücüne (PS) ve iklimlendirme/soğutma hesaplarında ' + btu.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' BTU/saat ısı enerjisi transfer hızına karşılık gelir.';
    document.getElementById('hc-wtd-desc').innerText = desc;

    document.getElementById('hc-watt-donusumu-hesaplama-result').classList.add('visible');
}
