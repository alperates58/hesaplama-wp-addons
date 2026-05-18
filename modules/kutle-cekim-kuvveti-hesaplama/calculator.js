function hcGravPresetChange() {
    const preset = document.getElementById('hc-grav-preset').value;
    
    const m1Input = document.getElementById('hc-grav-m1');
    const m2Input = document.getElementById('hc-grav-m2');
    const rInput = document.getElementById('hc-grav-r');
    const rUnit = document.getElementById('hc-grav-r-unit');

    if (preset === 'earth-moon') {
        m1Input.value = '5.972e24';
        m2Input.value = '7.346e22';
        rInput.value = '384400';
        rUnit.value = 'km';
    } else if (preset === 'sun-earth') {
        m1Input.value = '1.989e30';
        m2Input.value = '5.972e24';
        rInput.value = '149600000';
        rUnit.value = 'km';
    } else if (preset === 'sun-jupiter') {
        m1Input.value = '1.989e30';
        m2Input.value = '1.898e27';
        rInput.value = '778500000';
        rUnit.value = 'km';
    }
}

function hcKütleÇekimKuvvetiHesapla() {
    const m1 = parseFloat(document.getElementById('hc-grav-m1').value);
    const m2 = parseFloat(document.getElementById('hc-grav-m2').value);
    const rVal = parseFloat(document.getElementById('hc-grav-r').value);
    const rUnit = document.getElementById('hc-grav-r-unit').value;

    if (!m1 || !m2 || !rVal || m1 <= 0 || m2 <= 0 || rVal <= 0) {
        alert('Lütfen kütle ve mesafe değerlerini pozitif sayılar olarak giriniz.');
        return;
    }

    // Mesafeyi metreye çevirelim
    let r = rVal;
    if (rUnit === 'km') {
        r = rVal * 1000;
    }

    const G = 6.6743e-11;

    // F = G * m1 * m2 / r^2
    const force = G * m1 * m2 / Math.pow(r, 2);

    // Sonucu bilimsel veya normal gösterelim
    let forceStr = '';
    if (force >= 1e4 && force < 1e9) {
        forceStr = force.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' N';
    } else {
        forceStr = force.toExponential(4).replace('e+', ' &times; 10^').replace('e-', ' &times; 10^-') + ' N';
    }

    document.getElementById('hc-grav-val').innerHTML = forceStr;
    document.getElementById('hc-kutle-cekim-kuvveti-result').classList.add('visible');
}
