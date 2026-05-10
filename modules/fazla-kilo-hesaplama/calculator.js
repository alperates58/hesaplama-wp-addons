function hcExcessWeightHesapla() {
    const height = parseFloat(document.getElementById('hc-exw-height').value);
    const actual = parseFloat(document.getElementById('hc-exw-weight').value);

    if (!height || !actual) return;

    // Ideal weight based on BMI 24.9 (Upper limit of normal)
    const idealMax = 24.9 * Math.pow(height / 100, 2);
    const excess = actual - idealMax;
    
    const resVal = document.getElementById('hc-exw-res-val');
    const resDesc = document.getElementById('hc-exw-res-desc');

    if (excess > 0) {
        resVal.innerText = excess.toFixed(1).toLocaleString('tr-TR');
        resDesc.innerText = 'Sağlıklı aralığa ulaşmak için vermeniz gereken tahmini kilo miktarıdır.';
    } else {
        resVal.innerText = '0';
        resDesc.innerText = 'İdeal kilo aralığındasınız veya altındasınız.';
    }

    document.getElementById('hc-excess-weight-result').classList.add('visible');
}
