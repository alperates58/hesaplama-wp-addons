function hcANToggleCustom() {
    const planet = document.getElementById('hc-an-planet').value;
    document.getElementById('hc-an-custom-g').style.display = planet === 'custom' ? 'block' : 'none';
}

function hcANHesapla() {
    const mass = parseFloat(document.getElementById('hc-an-mass').value);
    const planet = document.getElementById('hc-an-planet').value;
    let g = 0;

    if (planet === 'custom') {
        g = parseFloat(document.getElementById('hc-an-g').value);
    } else {
        g = parseFloat(planet);
    }

    if (isNaN(mass) || isNaN(g) || mass < 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const weight = mass * g;

    document.getElementById('hc-an-val').innerText = weight.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N';
    document.getElementById('hc-an-result').classList.add('visible');
}
