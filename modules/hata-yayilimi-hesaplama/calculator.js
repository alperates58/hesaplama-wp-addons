function hcHataYayilimiHesapla() {
    const op = document.getElementById('hc-err-op').value;
    const valA = parseFloat(document.getElementById('hc-err-val-a').value);
    const stdA = parseFloat(document.getElementById('hc-err-std-a').value);
    const valB = parseFloat(document.getElementById('hc-err-val-b').value);
    const stdB = parseFloat(document.getElementById('hc-err-std-b').value);

    if (isNaN(stdA) || isNaN(stdB) || stdA < 0 || stdB < 0) {
        alert('Lütfen geçerli hata değerleri girin.');
        return;
    }

    let resultErr = 0;
    let formula = "";

    if (op === 'add') {
        resultErr = Math.sqrt(stdA * stdA + stdB * stdB);
        formula = "Formül: σZ = √(σA² + σB²)";
    } else {
        if (isNaN(valA) || isNaN(valB) || valA === 0 || valB === 0) {
            alert('Çarpma/Bölme işlemi için A ve B değerleri gereklidir ve 0 olamaz.');
            return;
        }
        // σz = |Z| * √((σA/A)² + (σB/B)²)
        const relativeErr = Math.sqrt(Math.pow(stdA / valA, 2) + Math.pow(stdB / valB, 2));
        resultErr = relativeErr; // This is the relative error part, but usually we show the absolute error σZ
        // Let's assume multiplication to show an absolute error
        const z = valA * valB;
        resultErr = Math.abs(z) * relativeErr;
        formula = "Formül: σZ = |Z| * √((σA/A)² + (σB/B)²)";
    }

    document.getElementById('hc-res-err-prop').innerText = "± " + resultErr.toLocaleString('tr-TR', { maximumFractionDigits: 6 });
    document.getElementById('hc-err-formula').innerText = formula;
    document.getElementById('hc-hata-yayilimi-result').classList.add('visible');
}
