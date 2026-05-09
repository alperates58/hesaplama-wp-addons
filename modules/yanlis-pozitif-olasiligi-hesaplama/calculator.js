function hcFalsePosProbHesapla() {
    const prev = (parseFloat(document.getElementById('hc-fpp-prev').value) || 0) / 100;
    const sens = (parseFloat(document.getElementById('hc-fpp-sens').value) || 0) / 100;
    const spec = (parseFloat(document.getElementById('hc-fpp-spec').value) || 0) / 100;

    // Bayes: P(H|+) = P(+|H) * P(H) / P(+)
    // P(+) = P(+|H)*P(H) + P(+|Sağlıklı)*P(Sağlıklı)
    const pPosH = sens;
    const pH = prev;
    const pPosS = 1 - spec;
    const pS = 1 - prev;

    const pPlus = (pPosH * pH) + (pPosS * pS);
    
    if (pPlus === 0) return;

    const ppv = (pPosH * pH) / pPlus; // Pozitif Tahmin Değeri
    const fdr = 1 - ppv; // Yanlış Keşif Oranı (Yanlış Pozitif Olasılığı)

    document.getElementById('hc-res-fpp-ppv').innerText = '%' + (ppv * 100).toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-res-fpp-fp').innerText = '%' + (fdr * 100).toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    document.getElementById('hc-false-pos-prob-result').classList.add('visible');
}
