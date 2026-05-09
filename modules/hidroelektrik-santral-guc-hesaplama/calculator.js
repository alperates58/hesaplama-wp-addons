function hcHidroGucHesapla() {
    const q = parseFloat(document.getElementById('hc-hp-flow').value);
    const h = parseFloat(document.getElementById('hc-hp-head').value);
    const eff = parseFloat(document.getElementById('hc-hp-eff').value);

    if (isNaN(q) || isNaN(h) || isNaN(eff)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const g = 9.81;
    const rho = 1000; // density of water
    
    // P (Watts) = rho * g * Q * H
    const theoryPowerW = rho * g * q * h;
    const netPowerW = theoryPowerW * (eff / 100);

    const theoryKw = theoryPowerW / 1000;
    const netKw = netPowerW / 1000;

    document.getElementById('hc-res-hp-theory').innerText = theoryKw.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kW';
    document.getElementById('hc-res-hp-net').innerText = netKw.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kW';

    document.getElementById('hc-hp-result').classList.add('visible');
}
