function hcSchwarzschildGirisDegisti() {
    var type = document.getElementById('hc-sy-type').value;
    var label = document.getElementById('hc-sy-mass-label');
    if (type === 'solar') {
        label.innerText = 'Kütle (Güneş Kütlesi - M☉)';
    } else if (type === 'kg') {
        label.innerText = 'Kütle (Kilogram - kg)';
    } else if (type === 'earth') {
        label.innerText = 'Kütle (Dünya Kütlesi - M⊕)';
    }
}

function hcSchwarzschildHesapla() {
    var type = document.getElementById('hc-sy-type').value;
    var rawMass = parseFloat(document.getElementById('hc-sy-mass').value);
    
    if (isNaN(rawMass) || rawMass <= 0) {
        alert('Lütfen pozitif bir kütle değeri girin.');
        return;
    }

    var G = 6.6743e-11;
    var c = 299792458;
    var solarMass = 1.989e30;
    var earthMass = 5.972e24;

    var massInKg = rawMass;
    if (type === 'solar') {
        massInKg = rawMass * solarMass;
    } else if (type === 'earth') {
        massInKg = rawMass * earthMass;
    }

    // Rs = 2GM / c^2
    var Rs = (2 * G * massInKg) / Math.pow(c, 2);

    var RsKm = Rs / 1000;
    var RsAu = Rs / 1.496e11;

    document.getElementById('hc-sy-res-m').innerText = Rs.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' m';
    document.getElementById('hc-sy-res-km').innerText = RsKm.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + ' km';
    document.getElementById('hc-sy-res-au').innerText = RsAu.toLocaleString('tr-TR', { maximumFractionDigits: 12 }) + ' AU';

    var desc = '';
    if (type === 'solar') {
        desc = 'Güneşimizin Schwarzschild yarıçapı yaklaşık 2,95 km\'dir. Girdiğiniz ' + rawMass.toLocaleString('tr-TR') + ' Güneş kütlesindeki yıldızın olay ufku yarıçapı ' + RsKm.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' km olacaktır.';
    } else if (type === 'earth') {
        desc = 'Dünyamızın Schwarzschild yarıçapı yaklaşık 8,87 mm\'dir. Girdiğiniz kütleye sahip gök cisminin olay ufku ' + (Rs * 1000).toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' milimetre olacaktır.';
    } else {
        desc = 'Girdiğiniz ' + rawMass.toLocaleString('tr-TR') + ' kg kütleye sahip cismin, kara delik haline gelebilmesi için ' + Rs.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + ' metre yarıçapa kadar sıkıştırılması gerekir.';
    }
    
    document.getElementById('hc-sy-desc').innerText = desc;
    document.getElementById('hc-schwarzschild-yaricapi-hesaplama-result').classList.add('visible');
}
