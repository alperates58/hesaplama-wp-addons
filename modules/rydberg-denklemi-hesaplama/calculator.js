function hcRydbergDenklemiHesapla() {
    const Z = parseInt(document.getElementById('hc-ry-z').value);
    const n1 = parseInt(document.getElementById('hc-ry-n1').value);
    const n2 = parseInt(document.getElementById('hc-ry-n2').value);

    if (isNaN(Z) || isNaN(n1) || isNaN(n2) || Z <= 0 || n1 <= 0 || n2 <= 0) {
        alert('Lütfen geçerli ve pozitif seviyeler giriniz.');
        return;
    }

    if (n2 <= n1) {
        alert('Üst seviye (n2), alt seviyeden (n1) büyük olmalıdır.');
        return;
    }

    // R = 1.097373e7 m-1 (Rydberg constant)
    const R = 1.0973731568e7;

    // 1/lambda = R * Z^2 * (1/n1^2 - 1/n2^2)
    const factor = (1 / Math.pow(n1, 2)) - (1 / Math.pow(n2, 2));
    const invLambda = R * Math.pow(Z, 2) * factor;

    const lambda = 1 / invLambda; // m
    const lambdaNm = lambda * 1e9; // nm

    // Foton enerjisi E = h * c / lambda
    // h = 6.62607e-34, c = 2.99792e8
    const h = 6.62607015e-34;
    const c = 299792458;
    const E_joule = (h * c) / lambda;
    const E_ev = E_joule / 1.602176634e-19;

    // Spektral bölge tahmini
    let region = 'Bilinmiyor';
    if (lambdaNm < 10) {
        region = 'X-Ray (Röntgen Işınları)';
    } else if (lambdaNm >= 10 && lambdaNm < 380) {
        region = 'Morötesi (Ultraviyole - UV)';
    } else if (lambdaNm >= 380 && lambdaNm <= 750) {
        // Renk tahmini
        if (lambdaNm >= 380 && lambdaNm < 450) region = 'Görünür Işık (Menekşe/Mor)';
        else if (lambdaNm >= 450 && lambdaNm < 495) region = 'Görünür Işık (Mavi)';
        else if (lambdaNm >= 495 && lambdaNm < 570) region = 'Görünür Işık (Yeşil)';
        else if (lambdaNm >= 570 && lambdaNm < 590) region = 'Görünür Işık (Sarı)';
        else if (lambdaNm >= 590 && lambdaNm < 620) region = 'Görünür Işık (Turuncu)';
        else region = 'Görünür Işık (Kırmızı)';
    } else {
        region = 'Kızılötesi (Infrared - IR)';
    }

    let lambdaText = '';
    if (lambdaNm >= 1000) {
        lambdaText = (lambdaNm / 1000).toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' µm';
    } else {
        lambdaText = lambdaNm.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' nm';
    }

    document.getElementById('hc-ry-lambda-val').innerText = lambdaText;
    document.getElementById('hc-ry-region-val').innerText = region;
    document.getElementById('hc-ry-energy-val').innerText = E_ev.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' eV (' + E_joule.toExponential(3).replace('e-', ' &times; 10^-') + ' J)';
    document.getElementById('hc-ry-wavenum-val').innerText = invLambda.toExponential(3).replace('e+', ' &times; 10^') + ' m⁻¹';

    document.getElementById('hc-rydberg-denklemi-result').classList.add('visible');
}
