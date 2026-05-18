function hcRakımaGöreHavaBasıncıHesapla() {
    const h = parseFloat(document.getElementById('hc-ap-alt').value);

    if (isNaN(h) || h < -500 || h > 11000) {
        alert('Lütfen -500 ile 11,000 metre arasında geçerli bir rakım değeri giriniz.');
        return;
    }

    // Barometrik Basınç Formülü (Troposfer için):
    // P = P0 * (1 - 0.0000225577 * h)^5.25588
    const p0 = 1013.25; // hPa
    const p = p0 * Math.pow(1 - 0.0000225577 * h, 5.25588);

    // Birim Dönüşümleri
    const kpa = p / 10;
    const mmhg = p * 0.750063755;
    const atm = p / 1013.25;
    const ratio = (p / p0) * 100;

    document.getElementById('hc-ap-val').innerText = p.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' hPa / mbar';
    document.getElementById('hc-ap-kpa-val').innerText = kpa.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kPa';
    document.getElementById('hc-ap-mmhg-val').innerText = mmhg.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' mmHg';
    document.getElementById('hc-ap-atm-val').innerText = atm.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' atm';
    document.getElementById('hc-ap-ratio-val').innerText = '%' + ratio.toLocaleString('tr-TR', { maximumFractionDigits: 1 });

    document.getElementById('hc-rakima-gore-hava-basinci-result').classList.add('visible');
}
