function hcMotoSigortaHesapla() {
    var yas = parseInt(document.getElementById('hc-msm-yas').value) || 25;
    var sehir = parseFloat(document.getElementById('hc-msm-sehir').value) || 1.0;
    var cc = parseFloat(document.getElementById('hc-msm-cc').value) || 1.0;
    var kademe = parseFloat(document.getElementById('hc-msm-kademe').value) || 1.0;
    var deneyim = parseInt(document.getElementById('hc-msm-deneyim').value) || 0;

    // Baz prim tutarı (2026 tahmini baz)
    var bazPrim = 4000;

    // Yaş çarpanı
    var yasCarp = 1.0;
    if (yas < 22) yasCarp = 1.6;
    else if (yas < 25) yasCarp = 1.35;
    else if (yas > 45) yasCarp = 0.85;

    // Deneyim çarpanı
    var deneyimCarp = 1.0;
    if (deneyim < 1) deneyimCarp = 1.3;
    else if (deneyim > 7) deneyimCarp = 0.8;

    var riskKat = sehir * cc * kademe * yasCarp * deneyimCarp;
    var tahminiPrim = bazPrim * riskKat;

    // Min - Max Tahmin aralığı
    var minPrim = tahminiPrim * 0.9;
    var maxPrim = tahminiPrim * 1.15;

    document.getElementById('hc-msm-res-risk').innerText = riskKat.toFixed(2) + 'x';
    document.getElementById('hc-msm-res-prim').innerText = Math.round(tahminiPrim).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-msm-res-aralik').innerText = Math.round(minPrim).toLocaleString('tr-TR') + ' ₺ - ' + Math.round(maxPrim).toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-msm-result').classList.add('visible');
}