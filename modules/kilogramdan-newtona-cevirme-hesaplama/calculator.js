function hcKgnGPlanetChange() {
    const planet = document.getElementById('hc-kgn-planet').value;
    const customGroup = document.getElementById('hc-kgn-custom-g-group');
    customGroup.style.display = planet === 'custom' ? 'block' : 'none';
}

function hcKilogramdanNewtonaCevirmeHesapla() {
    const mass = parseFloat(document.getElementById('hc-kgn-mass').value);
    const planetSelect = document.getElementById('hc-kgn-planet').value;
    
    let g = 9.80665;
    if (planetSelect === 'custom') {
        g = parseFloat(document.getElementById('hc-kgn-g').value);
    } else {
        g = parseFloat(planetSelect);
    }

    if (!mass || !g || mass <= 0 || g <= 0) {
        alert('Lütfen kütle ve yerçekimi ivmesi değerlerini pozitif sayılar olarak giriniz.');
        return;
    }

    // F = m * g
    const force = mass * g;

    document.getElementById('hc-kgn-val').innerText = force.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' N';
    document.getElementById('hc-kilogramdan-newtona-cevirme-result').classList.add('visible');
}
