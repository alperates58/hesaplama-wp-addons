function hcPsikrometrikHesapla() {
    const td = parseFloat(document.getElementById('hc-psy-td').value);
    const tw = parseFloat(document.getElementById('hc-psy-tw').value);
    const P = parseFloat(document.getElementById('hc-psy-p').value);

    if (isNaN(td) || isNaN(tw) || isNaN(P) || P <= 0) {
        alert('Lütfen kuru hazne, ıslak hazne sıcaklıkları ve barometrik basınç için geçerli sayılar giriniz.');
        return;
    }

    if (tw > td) {
        alert('Islak hazne sıcaklığı, kuru hazne sıcaklığından büyük olamaz.');
        return;
    }

    // Tetens saturated vapor pressure equations
    // esw at Tw (wet bulb)
    const esw = 6.1078 * Math.pow(10, (7.5 * tw) / (tw + 237.3));
    // esd at Td (dry bulb)
    const esd = 6.1078 * Math.pow(10, (7.5 * td) / (td + 237.3));

    // Sprung constant A = 6.6e-4 (over water)
    const A = 0.00066;
    
    // Actual vapor pressure (e)
    let e = esw - A * P * (td - tw);
    if (e < 0) e = 0;

    // Relative humidity (RH %)
    let rh = (e / esd) * 100;
    if (rh > 100) rh = 100;

    // Specific humidity ratio w (kg water / kg dry air)
    // w = 0.62198 * e / (P - e)
    const w = 0.62198 * (e / (P - e));
    const wGPerKg = w * 1000; // g / kg dry air

    // Enthalpy h (kJ / kg dry air)
    // h = 1.006 * Td + w * (2501 + 1.86 * Td)
    const h = (1.006 * td) + w * (2501 + 1.86 * td);

    // Dew point TDew
    let tDew = 0;
    if (e > 0) {
        const lnE = Math.log(e / 6.1078);
        tDew = (237.3 * lnE) / (17.27 - lnE);
    } else {
        tDew = -273.15;
    }

    document.getElementById('hc-psy-rh-val').innerText = rh.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' %';
    document.getElementById('hc-psy-tdew-val').innerText = tDew.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' °C';
    document.getElementById('hc-psy-w-val').innerText = wGPerKg.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' g/kg';
    document.getElementById('hc-psy-h-val').innerText = h.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kJ/kg';

    document.getElementById('hc-psikrometrik-result').classList.add('visible');
}
