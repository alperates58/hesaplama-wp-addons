function hcDEGRHesapla() {
    const d = parseFloat(document.getElementById('hc-degr-dist').value);

    if (isNaN(d) || d < 0) {
        alert('Lütfen geçerli bir mesafe giriniz.');
        return;
    }

    const R = 6371; // km
    // h = R - sqrt(R^2 - d^2)
    const h = R - Math.sqrt(Math.pow(R, 2) - Math.pow(d, 2));

    let resultText = "";
    if (h < 0.001) {
        resultText = (h * 1000 * 100).toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' cm';
    } else if (h < 1) {
        resultText = (h * 1000).toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m';
    } else {
        resultText = h.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' km';
    }

    document.getElementById('hc-degr-val').innerText = resultText;
    document.getElementById('hc-degr-result').classList.add('visible');
}
