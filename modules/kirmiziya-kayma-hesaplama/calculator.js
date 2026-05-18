function hcKırmızıyaKaymaHesapla() {
    const lambdaEmit = parseFloat(document.getElementById('hc-red-lambda-emit').value);
    const lambdaObs = parseFloat(document.getElementById('hc-red-lambda-obs').value);

    if (!lambdaEmit || !lambdaObs || lambdaEmit <= 0 || lambdaObs <= 0) {
        alert('Lütfen geçerli dalga boyu değerleri giriniz.');
        return;
    }

    // z = (lambda_obs - lambda_emit) / lambda_emit
    const z = (lambdaObs - lambdaEmit) / lambdaEmit;

    let typeStr = '';
    if (z > 0) {
        typeStr = 'Kırmızıya Kayma (Uzaklaşıyor)';
    } else if (z < 0) {
        typeStr = 'Maviye Kayma (Yakınlaşıyor)';
    } else {
        typeStr = 'Değişim Yok';
    }

    // Relativistik hız formülü:
    // v/c = ((z+1)^2 - 1) / ((z+1)^2 + 1)
    const zPlus1Sq = Math.pow(z + 1, 2);
    const vcRatio = (zPlus1Sq - 1) / (zPlus1Sq + 1); // v/c oranı
    
    const c = 299792.458; // km/s
    const v = vcRatio * c; // km/s

    // Hubble Mesafesi (Yaklaşık): d = v / H0. H0 ~ 70 km/s/Mpc
    const H0 = 70;
    const distMpc = Math.abs(v) / H0;
    const distMly = distMpc * 3.26156; // Işık yılı (milyon)

    document.getElementById('hc-red-z-val').innerText = z.toLocaleString('tr-TR', { maximumFractionDigits: 5 });
    document.getElementById('hc-red-type-val').innerText = typeStr;
    document.getElementById('hc-red-v-val').innerText = Math.abs(v).toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' km/s';
    document.getElementById('hc-red-vc-val').innerText = '%' + (vcRatio * 100).toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    
    if (z > 0) {
        document.getElementById('hc-red-dist-val').innerText = distMly.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' milyon ışık yılı (~' + distMpc.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Mpc)';
    } else {
        document.getElementById('hc-red-dist-val').innerText = 'N/A (Yakınlaşan gökcisimleri için Hubble yasası bu şekilde uygulanmaz)';
    }

    document.getElementById('hc-kirmiziya-kayma-result').classList.add('visible');
}
