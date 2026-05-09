function hcHemositometreHesapla() {
    const cells = parseFloat(document.getElementById('hc-hemo-cells').value);
    const squares = parseFloat(document.getElementById('hc-hemo-squares').value);
    const df = parseFloat(document.getElementById('hc-hemo-df').value);

    if (isNaN(cells) || isNaN(squares) || isNaN(df) || squares <= 0 || df <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    // Cells/mL = (Total Cells / Number of Squares) * Dilution Factor * 10,000
    const concentration = (cells / squares) * df * 10000;

    document.getElementById('hc-hemo-val').innerText = concentration.toExponential(3) + ' hücre/mL';
    document.getElementById('hc-hemo-result').classList.add('visible');
}
