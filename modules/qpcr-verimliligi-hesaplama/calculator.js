function hcQpcrEffHesapla() {
    const slope = parseFloat(document.getElementById('hc-qe-slope').value);

    if (isNaN(slope)) {
        alert('Lütfen eğim değerini giriniz.');
        return;
    }

    // Efficiency E = (10^(-1/slope) - 1) * 100
    const efficiency = (Math.pow(10, -1 / slope) - 1) * 100;

    const resVal = document.getElementById('hc-qe-res-val');
    resVal.innerText = efficiency.toFixed(1).toLocaleString('tr-TR');

    document.getElementById('hc-qpcr-eff-result').classList.add('visible');
}
