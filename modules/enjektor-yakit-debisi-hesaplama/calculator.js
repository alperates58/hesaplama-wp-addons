function hcIfHesapla() {
    const hp = parseFloat(document.getElementById('hc-if-hp').value);
    const cyl = parseFloat(document.getElementById('hc-if-cyl').value);
    const bsfc = parseFloat(document.getElementById('hc-if-bsfc').value);
    const duty = 0.8; // 80%

    if (isNaN(hp) || isNaN(cyl) || cyl === 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const lbsHr = (hp * bsfc) / (cyl * duty);
    const ccMin = lbsHr * 10.5;

    document.getElementById('hc-if-lbs').innerText = lbsHr.toFixed(1) + " lbs/hr";
    document.getElementById('hc-if-cc').innerText = Math.round(ccMin) + " cc/min";

    document.getElementById('hc-if-result').classList.add('visible');
}
