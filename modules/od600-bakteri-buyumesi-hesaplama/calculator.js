function hcOd600Hesapla() {
    const od = parseFloat(document.getElementById('hc-od-val').value);
    const speciesFactor = document.getElementById('hc-od-species').value;

    if (isNaN(od)) {
        alert('Lütfen OD600 değerini giriniz.');
        return;
    }

    let cellsPerMl = 0;
    if (speciesFactor === "8e8") {
        // E. coli için standart: 1.0 OD ≈ 1.3 - 1.6 x 10^9 (ortalama 1.5 alıyoruz)
        cellsPerMl = od * 1.5e9;
    } else {
        // Yeast için standart: 1.0 OD ≈ 2 x 10^7
        cellsPerMl = od * 2e7;
    }

    const resVal = document.getElementById('hc-od-res-val');
    resVal.innerText = cellsPerMl.toExponential(2).toLocaleString('tr-TR');

    document.getElementById('hc-od600-calc-result').classList.add('visible');
}
