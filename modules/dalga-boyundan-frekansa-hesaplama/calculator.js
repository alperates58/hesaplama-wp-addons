function hcDBFHesapla() {
    const v = parseFloat(document.getElementById('hc-dbf-speed').value);
    const lambda = parseFloat(document.getElementById('hc-dbf-lambda').value);

    if (isNaN(v) || isNaN(lambda) || lambda <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const freq = v / lambda;

    let resultText = "";
    if (freq >= 1e12) {
        resultText = (freq / 1e12).toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' THz';
    } else if (freq >= 1e9) {
        resultText = (freq / 1e9).toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' GHz';
    } else if (freq >= 1e6) {
        resultText = (freq / 1e6).toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' MHz';
    } else {
        resultText = freq.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' Hz';
    }

    document.getElementById('hc-dbf-val').innerText = resultText;
    document.getElementById('hc-dbf-result').classList.add('visible');
}
