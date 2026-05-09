function hcEVAHesapla() {
    const ebit = parseFloat(document.getElementById('hc-eva-ebit').value) || 0;
    const tax = (parseFloat(document.getElementById('hc-eva-tax').value) || 0) / 100;
    const capital = parseFloat(document.getElementById('hc-eva-capital').value) || 0;
    const wacc = (parseFloat(document.getElementById('hc-eva-wacc').value) || 0) / 100;

    const nopat = ebit * (1 - tax);
    const capitalCharge = capital * wacc;
    const eva = nopat - capitalCharge;

    document.getElementById('hc-eva-res-val').innerText = eva.toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-eva-result').classList.add('visible');
}
