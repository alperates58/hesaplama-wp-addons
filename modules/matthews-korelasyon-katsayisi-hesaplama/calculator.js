function hcMccHesapla() {
    const tp = parseFloat(document.getElementById('hc-mcc-tp').value) || 0;
    const tn = parseFloat(document.getElementById('hc-mcc-tn').value) || 0;
    const fp = parseFloat(document.getElementById('hc-mcc-fp').value) || 0;
    const fn = parseFloat(document.getElementById('hc-mcc-fn').value) || 0;
    const resultDiv = document.getElementById('hc-matthews-korelasyon-katsayisi-hesaplama-result');

    const numerator = (tp * tn) - (fp * fn);
    const denominator = Math.sqrt((tp + fp) * (tp + fn) * (tn + fp) * (tn + fn));

    let mcc = 0;
    if (denominator !== 0) {
        mcc = numerator / denominator;
    }

    document.getElementById('hc-mcc-res-val').innerText = mcc.toLocaleString('tr-TR', {maximumFractionDigits: 4});

    let desc = "";
    if (mcc > 0.7) desc = "Mükemmel tahmin gücü.";
    else if (mcc > 0.4) desc = "İyi tahmin gücü.";
    else if (mcc > 0) desc = "Zayıf tahmin gücü.";
    else if (mcc === 0) desc = "Rastgele tahmin ile eşdeğer.";
    else desc = "Tahminler gerçek değerlerle ters korelasyon gösteriyor.";

    document.getElementById('hc-mcc-res-desc').innerText = desc;

    resultDiv.classList.add('visible');
}
