function hcKolConvHesapla() {
    var val = parseFloat(document.getElementById('hc-kcv-val').value);
    var from = document.getElementById('hc-kcv-from').value;

    if (isNaN(val)) {
        alert('Lütfen bir değer giriniz.');
        return;
    }

    var res = 0;
    var toUnit = "";

    if (from === "mgdl") {
        res = val / 38.67;
        toUnit = "mmol/L";
    } else {
        res = val * 38.67;
        toUnit = "mg/dL";
    }

    var resDiv = document.getElementById('hc-kcv-result');
    var resValDiv = document.getElementById('hc-kcv-res');

    resValDiv.textContent = res.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + " " + toUnit;
    resDiv.classList.add('visible');
}
