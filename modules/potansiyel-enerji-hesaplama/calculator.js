function hcPeTypeChange() {
    const type = document.getElementById('hc-pe-type').value;
    document.getElementById('hc-pe-grav-fields').style.display = type === 'grav' ? 'block' : 'none';
    document.getElementById('hc-pe-elastic-fields').style.display = type === 'elastic' ? 'block' : 'none';
}

function hcPotansiyelEnerjiHesapla() {
    const type = document.getElementById('hc-pe-type').value;
    let ep = 0; // Joule

    if (type === 'grav') {
        const m = parseFloat(document.getElementById('hc-pe-mass').value);
        const h = parseFloat(document.getElementById('hc-pe-height').value);
        const g = parseFloat(document.getElementById('hc-pe-planet').value);

        if (isNaN(m) || isNaN(h) || isNaN(g) || m <= 0 || h < 0) {
            alert('Lütfen geçerli kütle ve yükseklik değerleri giriniz.');
            return;
        }
        // Ep = m * g * h
        ep = m * g * h;
    } else {
        const k = parseFloat(document.getElementById('hc-pe-k').value);
        const xCm = parseFloat(document.getElementById('hc-pe-x').value);

        if (isNaN(k) || isNaN(xCm) || k <= 0 || xCm < 0) {
            alert('Lütfen geçerli yay sabiti ve sıkışma miktarı giriniz.');
            return;
        }

        const x = xCm / 100; // cm -> metre
        // Ep = 0.5 * k * x^2
        ep = 0.5 * k * Math.pow(x, 2);
    }

    const kj = ep / 1000;
    const cal = ep / 4.184; // 1 cal ≈ 4.184 J

    document.getElementById('hc-pe-val').innerText = ep.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' J';
    document.getElementById('hc-pe-kj-val').innerText = kj.toLocaleString('tr-TR', { maximumFractionDigits: 5 }) + ' kJ';
    document.getElementById('hc-pe-cal-val').innerText = cal.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' cal';

    document.getElementById('hc-potansiyel-enerji-result').classList.add('visible');
}
