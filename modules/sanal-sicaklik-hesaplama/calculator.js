function hcVtMethodChange() {
    const method = document.getElementById('hc-vt-method').value;
    document.getElementById('hc-vt-mixing-group').style.display = method === 'mixing' ? 'block' : 'none';
    document.getElementById('hc-vt-rh-group').style.display = method === 'rh' ? 'block' : 'none';
}

function hcSanalSıcaklıkHesapla() {
    const tC = parseFloat(document.getElementById('hc-vt-temp').value);
    const method = document.getElementById('hc-vt-method').value;

    if (isNaN(tC) || tC < -273.15) {
        alert('Lütfen geçerli bir aktüel sıcaklık giriniz.');
        return;
    }

    const TKelvin = tC + 273.15;
    let w = 0; // kg / kg dry air

    if (method === 'mixing') {
        const wG = parseFloat(document.getElementById('hc-vt-w').value);
        if (isNaN(wG) || wG < 0) {
            alert('Lütfen geçerli ve pozitif bir karışım oranı giriniz.');
            return;
        }
        w = wG / 1000; // g/kg -> kg/kg
    } else {
        const rh = parseFloat(document.getElementById('hc-vt-rh').value);
        const P = parseFloat(document.getElementById('hc-vt-p').value);

        if (isNaN(rh) || rh < 0 || rh > 100 || isNaN(P) || P <= 0) {
            alert('Lütfen geçerli bağıl nem (% 0-100) ve toplam basınç giriniz.');
            return;
        }

        // es saturated vapor pressure using Tetens
        const es = 6.1078 * Math.pow(10, (7.5 * tC) / (tC + 237.3));
        const e = (rh / 100) * es;

        // w = epsilon * e / (P - e) where epsilon = 0.622
        w = 0.62197 * (e / (P - e));
    }

    // Tv = T * (1 + 0.61 * w)
    const tvK = TKelvin * (1 + 0.608 * w);
    const tvC = tvK - 273.15;

    const diff = tvC - tC;

    document.getElementById('hc-vt-val').innerText = tvC.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' °C';
    document.getElementById('hc-vt-k-val').innerText = tvK.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' K';
    document.getElementById('hc-vt-diff-val').innerText = '+' + diff.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' °C';

    document.getElementById('hc-sanal-sicaklik-result').classList.add('visible');
}
